using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace db_2024._10._01_formsapp
{
    public partial class Form1 : Form
    {
        private string HostName = "localhost";
        private string PortName = "3306";
        private string UserName = "root";
        private string Password = string.Empty;
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            btnUpdate.Enabled = false;
            textHostName.Text = HostName;
            textPortName.Text = PortName;
            textUserName.Text = UserName;
            textPassword.Text = Password;
        }

        private void btnUpdate_Click(object sender, EventArgs e)
        {

            HostName = textHostName.Text;
            PortName = textPortName.Text;
            UserName = textUserName.Text;;d
            Password = textPassword.Text;
            DisplayData();
        }

        private void DisplayData()
        {
            MySqlConnectionStringBuilder mySqlConnectionStringBuilder = new MySqlConnectionStringBuilder()
            {
                Server = HostName,
                Port = (uint)System.Convert.ToInt32(PortName),
                UserID = UserName,
                Password = Password,
                //Database = "Parks_and_Recreation",
                //SslMode = MySqlSslMode.Preferred
            };
            string ConnectionString = $"datasource={HostName};port={PortName};username={UserName};password={Password}"; ;
            MySqlConnection MyConn2 = new MySqlConnection(ConnectionString);
            string sqlQuery = $"select first_name, last_name from {textDatabase.Text}.employee_demographics;";
            //string sqlQuery = $"select ID from {textDatabase.Text}.wp_posts;";
            try
            {
                MyConn2.Open();
                MySqlCommand MyCommand2 = new MySqlCommand(sqlQuery, MyConn2);
                MySqlDataAdapter MyAdapter = new MySqlDataAdapter();
                MyAdapter.SelectCommand = MyCommand2;
                DataTable dTable = new DataTable();
                MyAdapter.Fill(dTable);
                dataGridView1.DataSource = dTable;
            }
            catch (Exception ex)
            {

                MessageBox.Show($"Hiba az adatbázis kapcsolódásakor: {ex.Message}");
            }

            string sqlQuery2 = $"call {textDatabase.Text}.CreatePersonTable();";
            try
            {
                MySqlCommand MyCommand2 = new MySqlCommand(sqlQuery2, MyConn2);
                MySqlDataAdapter MyAdapter = new MySqlDataAdapter();
                MyAdapter.SelectCommand = MyCommand2;
                DataTable dTable = new DataTable();
                MyAdapter.Fill(dTable);
                dataGridView2.DataSource = dTable;
            }
            catch (Exception ex)
            {

                MessageBox.Show($"Hiba az adatbázis kapcsolódásakor: {ex.Message}");
            }
            MyConn2.Close();
        }

        private void textHostName_TextChanged(object sender, EventArgs e)
        {
            UpdateButton();
        }

        private void UpdateButton()
        {
            string Cn = string.Empty;
            if (!string.IsNullOrWhiteSpace(textHostName.Text) && !string.IsNullOrWhiteSpace(textUserName.Text) && !string.IsNullOrWhiteSpace(textPortName.Text))
            {
                btnUpdate.Enabled = true;
            }
            else
            {
                btnUpdate.Enabled = false;
            }
        }

        private void textPortName_TextChanged(object sender, EventArgs e)
        {
            UpdateButton();
        }

        private void textUserName_TextChanged(object sender, EventArgs e)
        {
            UpdateButton();
        }

        private void textPassword_TextChanged(object sender, EventArgs e)
        {
            UpdateButton();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string ConnectionString = $"datasource={HostName};port={PortName};username={UserName};password={Password}"; ;
            MySqlConnection MyConn2 = new MySqlConnection(ConnectionString);
            //string sqlQuery = $"insert into {textDatabase.Text}.employee_demographics(first_name,last_name,age,gender," +
            //$"birth_date" +
            //$"values('" + this.textFirstName.Text + "','" + this.textLastName.Text + "','" + this.textAge.Text + "','" + this.textGender.Text + "','" + this.textSzulDat.Text + "')";
            string sqlQuery = $"INSERT INTO `{textDatabase.Text}`.`employee_demographics` (`first_name`, `last_name`, `age`, `gender`, `birth_date`) VALUES ('{textFirstName.Text}', '{textLastName.Text}', '{textAge.Text}', '{textGender.Text}', '{textSzulDat.Text}');";

            MySqlCommand MyCommand2 = new MySqlCommand(sqlQuery, MyConn2);
            MySqlDataReader MyReader2;
            MyConn2.Open();
            MyReader2 = MyCommand2.ExecuteReader();
            MessageBox.Show("Adat beszúrva");
            while (MyReader2.Read())
            {
            }
            MyConn2.Close();
        }

        private void btn_userAdd_Click(object sender, EventArgs e)
        {

            string ConnectionString = $"datasource={HostName};port={PortName};username={UserName};password={Password}"; ;
            MySqlConnection MyConn2 = new MySqlConnection(ConnectionString);
            //string sqlQuery = $"insert into {textDatabase.Text}.employee_demographics(first_name,last_name,age,gender," +
            //$"birth_date" +
            //$"values('" + this.textFirstName.Text + "','" + this.textLastName.Text + "','" + this.textAge.Text + "','" + this.textGender.Text + "','" + this.textSzulDat.Text + "')";
            //string sqlQuery = $"INSERT INTO `{textDatabase.Text}`.`wp_users` (`user_login`, `user_pass`, `user_nickname`, `user_email`n `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES ('{tb_userName.Text}', '{tb_password.Text}', '{tb_userName.Text}', '{tb_email.Text} , 'http://localhost/wordpress', '{DateTime.Now}', '', '0', '{tb_userName.Text}';";
            string sqlQuery = $"INSERT INTO `wordpress`.`wp_users` (`user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_status`, `display_name`) VALUES ('{tb_userName.Text}', '{tb_password.Text}', '{tb_userName.Text}', '{tb_email.Text}', 'http://localhost/wordpress', '{DateTime.Now}', '0', '{tb_userName.Text}');";
            MySqlCommand MyCommand2 = new MySqlCommand(sqlQuery, MyConn2);
            MySqlDataReader MyReader2;
            MyConn2.Open();
            MyReader2 = MyCommand2.ExecuteReader();
            MessageBox.Show("Adat beszúrva");
            while (MyReader2.Read())
            {
            }
            MyConn2.Close();

        }

        private void tabPage2_Click(object sender, EventArgs e)
        {
            
        }
    }
}