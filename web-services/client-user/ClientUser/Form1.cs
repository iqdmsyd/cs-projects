using ClientUser.Models;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ClientUser
{
    public partial class Form1 : Form
    {
        Barang brg;
        Pesanan psn;
        ListPesanan lPesanan;
        List<DetilTransaksi> lDetilTransaksi;
        Grosir gsr; //data akun/grosir yang login

        int qty;
        int totalHarga;
        int totalQty;

        HttpClient client = new HttpClient();
        Token tkn;

        public Form1()
        {
            InitializeComponent();
            client.BaseAddress = new Uri("http://55a51802.ngrok.io/api/");
            client.DefaultRequestHeaders.Accept.Clear();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

            brg = new Barang();
            psn = new Pesanan();
            lPesanan = new ListPesanan();
            lDetilTransaksi = new List<DetilTransaksi>();
            gsr = new Grosir();

            // panel awal yang ditampilkan
            panelLogin.Visible = true;
            panelMain.Visible = false;

            panelMobile.Visible = true;
            panelLayanan.Visible = false;
            panelCart.Visible = false;
            panelSearchAdvance.Visible = false;
            panelUser.Visible = false;

            tbMinHarga.Text = "0";
            tbMaxHarga.Text = "0";
            cbTahun.Text = "None";
            cbTipe.Text = "None";
            cbUrutkan.Text = "Termurah";
            
        }

        private void dataGridView1_SelectionChanged(object sender, EventArgs e) //menampilkan data barang yang di klik
        {
            try
            {
                if (dataGridView1.SelectedCells.Count > 0)
                {
                    int selectedrowindex = dataGridView1.SelectedCells[0].RowIndex;

                    DataGridViewRow selectedRow = dataGridView1.Rows[selectedrowindex];

                    int id = Convert.ToInt32(selectedRow.Cells["ID"].Value);

                    //RepoBarang rpBarang = new RepoBarang();

                    client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", tkn.token);
                    HttpResponseMessage response = client.GetAsync("Barang/GetById/" + id).Result;
                    brg = response.Content.ReadAsAsync<Barang>().Result;
                    if (brg == null)
                        MessageBox.Show("Maaf bro, itemnya ga ada"); //Respon kalo ternyata objek yg dikirim itu null

                    //brg = rpBarang.GetByID(id);
                    pictureBox1.ImageLocation = brg.ImgUrl;
                    pictureBox1.SizeMode = PictureBoxSizeMode.StretchImage;

                    namaBarang.Text = brg.NamaBarang;
                    deskripsiBarang.Text = brg.Deskripsi;
                    hargaBarang.Text = "Rp. " + brg.HargaJual;
                }
            }
            catch (Exception er)
            {
                MessageBox.Show(er.Message);
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void btnShutdown_Click(object sender, EventArgs e) //keluar aplikasi
        {
            this.Close();
        }

        private void btnPesan_Click(object sender, EventArgs e) //menambahkan barang ke keranjang (cart)
        {
            try
            {
                qty = Convert.ToInt32(tbMobileQty.Text);

                int found = 0;
            
                foreach (var item in lPesanan.Detail)
                {
                    if (item.IdBarang == brg.ID) //pernah dipesan (ada dalam list)
                    {
                        item.Qty = Convert.ToInt32(tbMobileQty.Text);
                        item.Total = item.Qty * item.Harga;
                        found = 1;
                    }  
                }
                
                if(found == 0)
                {
                    lPesanan.Detail.Add(new Pesanan { IdBarang = brg.ID, NamaBarang = brg.NamaBarang, Qty = qty, Harga = brg.HargaJual, Total = (brg.HargaJual * qty) });
                }

                btnQtyCart.Text = Convert.ToString(lPesanan.Detail.Count());
                MessageBox.Show("Berhasil ditambahkan ke keranjang.");
            }
            catch (Exception er)
            {
                MessageBox.Show(er.Message);
            }

        }

        private void btnMobile_Click(object sender, EventArgs e) //menampilkan panel mobile
        {
            panelMobile.Visible = true;
            panelLayanan.Visible = false;
            panelCart.Visible = false;
            panelSearchAdvance.Visible = false;
            panelUser.Visible = false;
        }

        private void btnLayanan_Click(object sender, EventArgs e) //menampilkan panel layanan
        {

            panelLayanan.Visible = true;
            panelMobile.Visible = false;
            panelCart.Visible = false;
            panelSearchAdvance.Visible = false;
            panelUser.Visible = false;

        }

        private void hitungTotalHargaQty() //prosedur menghitung total yang dibayar dan qty keseluruhan barang pesanan
        {

            totalQty = 0;
            totalHarga = 0;

            foreach (var item in lPesanan.Detail)
            {
                totalQty = totalQty + item.Qty;
                totalHarga = totalHarga + item.Total;
            }

            labelTotalQty.Text = "Total Qty : " + Convert.ToString(totalQty);
            labelTotalHarga.Text = "Total Harga : " + Convert.ToString(totalHarga);
        }

        private void btnCart_Click(object sender, EventArgs e) //menampilkan panel cart
        {

            tbNamaGrosir.Text = gsr.NamaGrosir;
            tbNamaPemilik.Text = gsr.NamaPemilik;
            tbEmail.Text = gsr.Email;
            tbNoTelepon.Text = gsr.NoTelp;
            tbAlamat.Text = gsr.Alamat;

            hitungTotalHargaQty();

            detailBindingSource.DataSource = lPesanan.Detail;
            detailBindingSource.CurrencyManager.Refresh();
            dataGridView2.DataSource = detailBindingSource;

            panelCart.Visible = true;
            panelMobile.Visible = false;
            panelLayanan.Visible = false;
            panelSearchAdvance.Visible = false;
            panelUser.Visible = false;
        }

        private void btnAdvance_Click(object sender, EventArgs e) //menampilkan panel advance search (cari lebih spesifik)
        {
            panelSearchAdvance.Visible = true;
            panelCart.Visible = false;
            panelMobile.Visible = false;
            panelLayanan.Visible = false;
            panelUser.Visible = false;
        }

        private void btnUser_Click(object sender, EventArgs e) //menampilkan panel user
        {
            tbUserNamaGrosir.Text = gsr.NamaGrosir;
            tbUserNamaPemilik.Text = gsr.NamaPemilik;
            tbUserEmail.Text = gsr.Email;
            tbUserNoTelepon.Text = gsr.NoTelp;
            tbUserAlamat.Text = gsr.Alamat;

            panelUser.Visible = true;
            panelSearchAdvance.Visible = false;
            panelCart.Visible = false;
            panelMobile.Visible = false;
            panelLayanan.Visible = false;
        }

        private async void btnLogin_Click(object sender, EventArgs e) //login
        {
            try
            {
                Grosir user = new Grosir { Email = tbLoginEmail.Text, Password = tbLoginPassword.Text };
                HttpResponseMessage response = await client.PostAsJsonAsync("Token/Grosir", user);
                response.EnsureSuccessStatusCode();
                tkn = response.Content.ReadAsAsync<Token>().Result;
                MessageBox.Show("Login sukses!");

                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", tkn.token);
                response = client.GetAsync("Barang/GetAll").Result;
                var brang = response.Content.ReadAsAsync<List<Barang>>().Result;
                if (brang != null)
                    dataGridView1.DataSource = brang;
                else
                    MessageBox.Show("Maaf, item tidak ada."); //Respon kalo ternyata objek yg dikirim itu null

                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", tkn.token);
                response = client.GetAsync("User/GetGrosir/" + user.Email + "/" + user.Password).Result;
                gsr = response.Content.ReadAsAsync<Grosir>().Result;



                panelMain.Visible = true;
                panelLogin.Visible = false;

                panelMobile.Visible = true;
                panelLayanan.Visible = false;
                panelCart.Visible = false;
                panelSearchAdvance.Visible = false;
                panelUser.Visible = false;
            }
            catch (Exception)
            {
                MessageBox.Show("Login gagal.\nUsername atau password salah.");
            }

        }

        private void btnLogout_Click(object sender, EventArgs e) //logout
        {
            panelLogin.Visible = true;
            panelMain.Visible = false;
        }

        private void btnFilter_Click(object sender, EventArgs e) //filter barang
        {

            try
            {
                HttpResponseMessage response = new HttpResponseMessage();

                if(tbMinHarga.Text == "0" && tbMaxHarga.Text == "0" && cbTahun.Text == "None" && cbTipe.Text == "None") //jika filter hanya dengan urutkan
                {
                    response = client.GetAsync("Barang/GetBy/" + cbUrutkan.Text).Result;
                    var brang = response.Content.ReadAsAsync<List<Barang>>().Result;
                    if (brang != null)
                        dataGridView1.DataSource = brang;
                    else
                        MessageBox.Show("Maaf, item tidak ada."); //Respon kalo ternyata objek yg dikirim itu null
                }
                else
                {
                    response = client.GetAsync("Barang/GetFilter/" + tbMinHarga.Text + "/" + tbMaxHarga.Text + "/" + cbTahun.Text + "/" + cbTipe.Text + "/" + cbUrutkan.Text).Result;
                    var brang = response.Content.ReadAsAsync<List<Barang>>().Result;
                    if (brang != null)
                        dataGridView1.DataSource = brang;
                    else
                        MessageBox.Show("Maaf, item tidak ada."); //Respon kalo ternyata objek yg dikirim itu null
                }
                
            }
            catch (Exception er)
            {
                MessageBox.Show(er.Message);
            }
        }

        int idPesananSelected; //menampung id barang yang di pilih di keranjang
        private void dataGridView2_SelectionChanged(object sender, EventArgs e) //menambil data id barang yang di pilih dikeranjang
        {
            if (dataGridView2.SelectedCells.Count > 0)
            {
                int selectedrowindex = dataGridView2.SelectedCells[0].RowIndex;

                DataGridViewRow selectedRow = dataGridView2.Rows[selectedrowindex];

                idPesananSelected = Convert.ToInt32(selectedRow.Cells["idBarang"].Value);

            }
        }

        private void tbCartQty_TextChanged(object sender, EventArgs e) //rubah qty barang di keranjang
        {
            if(tbCartQty.Text == "0")
            {
                tbCartQty.Text = "1";
            }

            try
            {
                foreach (var item in lPesanan.Detail)
                {
                    if (item.IdBarang == idPesananSelected) //pernah dipesan (ada dalam list)
                    {
                        item.Qty = Convert.ToInt32(tbCartQty.Text);
                        item.Total = item.Qty * item.Harga;
                    }
                }

                hitungTotalHargaQty();
                detailBindingSource.DataSource = lPesanan.Detail;
                detailBindingSource.CurrencyManager.Refresh();
                dataGridView2.DataSource = detailBindingSource;
            }
            catch(Exception er)
            {
                MessageBox.Show(er.Message);
            }
        }

        private void btnTambahQty_Click(object sender, EventArgs e) //tambah qty barang di keranjang
        {
            foreach (var item in lPesanan.Detail)
            {
                if (item.IdBarang == idPesananSelected) //pernah dipesan (ada dalam list)
                {
                    item.Qty = item.Qty + 1;
                    item.Total = item.Qty * item.Harga;
                    tbCartQty.Text = Convert.ToString(item.Qty);
                }
            }

            hitungTotalHargaQty();
            detailBindingSource.DataSource = lPesanan.Detail;
            detailBindingSource.CurrencyManager.Refresh();
            dataGridView2.DataSource = detailBindingSource;
        }

        private void btnKurangQty_Click(object sender, EventArgs e) //kurang qty barang di keranjang
        {
            foreach (var item in lPesanan.Detail)
            {
                if (item.IdBarang == idPesananSelected) //pernah dipesan (ada dalam list)
                {
                    item.Qty = item.Qty - 1;
                    item.Total = item.Qty * item.Harga;
                    tbCartQty.Text = Convert.ToString(item.Qty);
                }
            }

            hitungTotalHargaQty();
            detailBindingSource.DataSource = lPesanan.Detail;
            detailBindingSource.CurrencyManager.Refresh();
            dataGridView2.DataSource = detailBindingSource;
        }

        private void btnHapus_Click(object sender, EventArgs e) //hapus barang di keranjang
        {

            DialogResult dialogResult = MessageBox.Show("Menghapus barang. Anda Yakin ?", "Hapus Barang", MessageBoxButtons.YesNo);
            if (dialogResult == DialogResult.Yes)
            {
                lPesanan.Detail.RemoveAll(x => x.IdBarang == idPesananSelected);
                btnQtyCart.Text = Convert.ToString(lPesanan.Detail.Count());

                hitungTotalHargaQty();
                detailBindingSource.DataSource = lPesanan.Detail;
                detailBindingSource.CurrencyManager.Refresh();
                dataGridView2.DataSource = detailBindingSource;
            }
            else if (dialogResult == DialogResult.No)
            {
                //MessageBox.Show("Engga jadi euy");
            }

        }

        private async void btnPesanBarang_Click(object sender, EventArgs e) //pesan barang (transaksi)
        {
            DialogResult dialogResult = MessageBox.Show("Pesan Sekarang ?", "Konfirmasi Pemesanan", MessageBoxButtons.YesNo);
            if (dialogResult == DialogResult.Yes)
            {
                Transaksi trans = new Transaksi();

                trans.ID_Grosir = gsr.ID;
                trans.Qty = 0;
                trans.TanggalTransaksi = DateTime.Now;
                trans.TotalBayar = 0;

                
                // post transaksi ke ws
                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", tkn.token);
                HttpResponseMessage response = await client.PostAsJsonAsync("Transaksi", trans);
                response.EnsureSuccessStatusCode();
                var resp = response.Content.ReadAsStringAsync().Result; //dapetin respon dari servis

                
                //get transaksi yang baru di post
                Transaksi transNew = new Transaksi();
                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", tkn.token);
                response = client.GetAsync("Transaksi/GetByGrosirNew/" + trans.ID_Grosir).Result;
                transNew = response.Content.ReadAsAsync<Transaksi>().Result;

                // pindahin dari list pesanan yang di keranjang ke detail transaksi
                foreach (var item in lPesanan.Detail) //isi detil transaksi dari daftar pesanan
                {
                    // get detil barang
                    response = client.GetAsync("Barang/GetDetil/" + item.IdBarang + "/" + item.Qty).Result;
                    var temp = response.Content.ReadAsAsync<List<DetilBarang>>().Result;
                    foreach (DetilBarang itm in temp)
                    {
                        lDetilTransaksi.Add(new DetilTransaksi { ID_Barang = itm.ID_Barang, NoSeri = itm.NoSeri, HargaJual = item.Harga });
                    }
                }

                // post detil transaksi ke ws
                response = await client.PostAsJsonAsync("Transaksi/Detil/" + trans.ID_Grosir, lDetilTransaksi);
                response.EnsureSuccessStatusCode();
                var msg = response.Content.ReadAsAsync<Msg>().Result; //dapetin respon dari servis
                MessageBox.Show(msg.Pesan);

                MessageBox.Show("Berhasil dipesan.");
            }
            else if (dialogResult == DialogResult.No)
            {
                MessageBox.Show("Engga jadi euy");
            }
        }

        private void panelLogin_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
