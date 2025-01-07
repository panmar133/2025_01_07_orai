using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
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
            textUserName.Text = UserName;;
            textPassword.Text = Password;
        }

        private void btnUpdate_Click(object sender, EventArgs e)
        {

            HostName = textHostName.Text;
            PortName = textPortName.Text;
            UserName = textUserName.Text;
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
                SslMode = MySqlSslMode.Preferred
            };
            string ConnectionString = mySqlConnectionStringBuilder.ConnectionString;// $"datasource={HostName};port={PortName};username={UserName};password={Password}"; ;
            MySqlConnection MyConn2 = new MySqlConnection(ConnectionString);
            string sqlQuery = "select * from sql7734860.employee_demographics;";
            try
            {
                MySqlCommand MyCommand2 = new MySqlCommand(sqlQuery, MyConn2);
                MySqlDataAdapter MyAdapter = new MySqlDataAdapter();
                MyAdapter.SelectCommand = MyCommand2;
                DataTable dTable = new DataTable();
                MyAdapter.Fill(dTable);
                dataGridView1.DataSource = dTable;
            }
            catch (Exception ex)
            {

                //MessageBox.Show($"Hiba az adatbázis kapcsolódásakor: {ex.Message}");
                MessageBox.Show($"Hiba az adatbázis kapcsolódásakor: {ex.Message}", "MySQL kapcsolódási hiba", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
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
    }
}