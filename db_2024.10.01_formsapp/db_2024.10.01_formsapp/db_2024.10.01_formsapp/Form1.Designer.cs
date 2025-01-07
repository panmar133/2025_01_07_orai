namespace db_2024._10._01_formsapp
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabUser = new System.Windows.Forms.TabPage();
            this.btnUpdate = new System.Windows.Forms.Button();
            this.textPassword = new System.Windows.Forms.TextBox();
            this.textUserName = new System.Windows.Forms.TextBox();
            this.textPortName = new System.Windows.Forms.TextBox();
            this.textHostName = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.tabViewTable = new System.Windows.Forms.TabPage();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.tabInsert = new System.Windows.Forms.TabPage();
            this.tabUpdate = new System.Windows.Forms.TabPage();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.tabControl1.SuspendLayout();
            this.tabUser.SuspendLayout();
            this.tabViewTable.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabUser);
            this.tabControl1.Controls.Add(this.tabViewTable);
            this.tabControl1.Controls.Add(this.tabInsert);
            this.tabControl1.Controls.Add(this.tabUpdate);
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tabControl1.Location = new System.Drawing.Point(0, 0);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(800, 450);
            this.tabControl1.TabIndex = 0;
            // 
            // tabUser
            // 
            this.tabUser.Controls.Add(this.btnUpdate);
            this.tabUser.Controls.Add(this.textPassword);
            this.tabUser.Controls.Add(this.textUserName);
            this.tabUser.Controls.Add(this.textPortName);
            this.tabUser.Controls.Add(this.textHostName);
            this.tabUser.Controls.Add(this.label4);
            this.tabUser.Controls.Add(this.label3);
            this.tabUser.Controls.Add(this.label2);
            this.tabUser.Controls.Add(this.label1);
            this.tabUser.Location = new System.Drawing.Point(4, 25);
            this.tabUser.Name = "tabUser";
            this.tabUser.Size = new System.Drawing.Size(792, 421);
            this.tabUser.TabIndex = 3;
            this.tabUser.Text = "felhasznaloAdatok";
            this.tabUser.UseVisualStyleBackColor = true;
            // 
            // btnUpdate
            // 
            this.btnUpdate.Location = new System.Drawing.Point(99, 159);
            this.btnUpdate.Name = "btnUpdate";
            this.btnUpdate.Size = new System.Drawing.Size(112, 38);
            this.btnUpdate.TabIndex = 12;
            this.btnUpdate.Text = "Frissítés";
            this.btnUpdate.UseVisualStyleBackColor = true;
            this.btnUpdate.Click += new System.EventHandler(this.btnUpdate_Click);
            // 
            // textPassword
            // 
            this.textPassword.Location = new System.Drawing.Point(141, 114);
            this.textPassword.Name = "textPassword";
            this.textPassword.Size = new System.Drawing.Size(216, 22);
            this.textPassword.TabIndex = 11;
            this.textPassword.UseSystemPasswordChar = true;
            this.textPassword.TextChanged += new System.EventHandler(this.textPassword_TextChanged);
            // 
            // textUserName
            // 
            this.textUserName.Location = new System.Drawing.Point(141, 86);
            this.textUserName.Name = "textUserName";
            this.textUserName.Size = new System.Drawing.Size(216, 22);
            this.textUserName.TabIndex = 10;
            this.textUserName.TextChanged += new System.EventHandler(this.textUserName_TextChanged);
            // 
            // textPortName
            // 
            this.textPortName.Location = new System.Drawing.Point(141, 52);
            this.textPortName.Name = "textPortName";
            this.textPortName.Size = new System.Drawing.Size(216, 22);
            this.textPortName.TabIndex = 9;
            this.textPortName.TextChanged += new System.EventHandler(this.textPortName_TextChanged);
            // 
            // textHostName
            // 
            this.textHostName.Location = new System.Drawing.Point(141, 20);
            this.textHostName.Name = "textHostName";
            this.textHostName.Size = new System.Drawing.Size(216, 22);
            this.textHostName.TabIndex = 8;
            this.textHostName.TextChanged += new System.EventHandler(this.textHostName_TextChanged);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(27, 114);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(46, 16);
            this.label4.TabIndex = 7;
            this.label4.Text = "Jelszó";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(27, 86);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(102, 16);
            this.label3.TabIndex = 6;
            this.label3.Text = "Felhasználónév";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(27, 55);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(31, 16);
            this.label2.TabIndex = 5;
            this.label2.Text = "Port";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(18, 26);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(55, 16);
            this.label1.TabIndex = 4;
            this.label1.Text = "Gépnév";
            // 
            // tabViewTable
            // 
            this.tabViewTable.Controls.Add(this.dataGridView1);
            this.tabViewTable.Location = new System.Drawing.Point(4, 25);
            this.tabViewTable.Name = "tabViewTable";
            this.tabViewTable.Padding = new System.Windows.Forms.Padding(3);
            this.tabViewTable.Size = new System.Drawing.Size(792, 421);
            this.tabViewTable.TabIndex = 0;
            this.tabViewTable.Text = "Alap adatok";
            this.tabViewTable.UseVisualStyleBackColor = true;
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.dataGridView1.Location = new System.Drawing.Point(3, 3);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.RowHeadersWidth = 51;
            this.dataGridView1.RowTemplate.Height = 24;
            this.dataGridView1.Size = new System.Drawing.Size(786, 415);
            this.dataGridView1.TabIndex = 0;
            // 
            // tabInsert
            // 
            this.tabInsert.Location = new System.Drawing.Point(4, 25);
            this.tabInsert.Name = "tabInsert";
            this.tabInsert.Padding = new System.Windows.Forms.Padding(3);
            this.tabInsert.Size = new System.Drawing.Size(792, 421);
            this.tabInsert.TabIndex = 1;
            this.tabInsert.Text = "Adatbeszúrás";
            this.tabInsert.UseVisualStyleBackColor = true;
            // 
            // tabUpdate
            // 
            this.tabUpdate.Location = new System.Drawing.Point(4, 25);
            this.tabUpdate.Name = "tabUpdate";
            this.tabUpdate.Padding = new System.Windows.Forms.Padding(3);
            this.tabUpdate.Size = new System.Drawing.Size(792, 421);
            this.tabUpdate.TabIndex = 2;
            this.tabUpdate.Text = "Adatfrissítés";
            this.tabUpdate.UseVisualStyleBackColor = true;
            // 
            // tabPage1
            // 
            this.tabPage1.Location = new System.Drawing.Point(4, 25);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(792, 421);
            this.tabPage1.TabIndex = 4;
            this.tabPage1.Text = "tabPage1";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.tabControl1);
            this.Name = "Form1";
            this.Text = "Adatbázis gyakorlás";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.tabControl1.ResumeLayout(false);
            this.tabUser.ResumeLayout(false);
            this.tabUser.PerformLayout();
            this.tabViewTable.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.TabPage tabViewTable;
        private System.Windows.Forms.TabPage tabInsert;
        private System.Windows.Forms.TabPage tabUpdate;
        private System.Windows.Forms.TabPage tabUser;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox textHostName;
        private System.Windows.Forms.TextBox textPassword;
        private System.Windows.Forms.TextBox textUserName;
        private System.Windows.Forms.TextBox textPortName;
        private System.Windows.Forms.Button btnUpdate;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TabPage tabPage1;
    }
}

