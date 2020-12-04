using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using MySql.Data.MySqlClient;

namespace ClientUser.Models
{
    public class RepoBarang
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");
        string none = "None";

        //--- CRUD BARANG ---//
        public void Insert(Barang item)
        {
            Barang newPart = item;

            //create query
            string sql = "INSERT INTO barang (NamaBarang, ID_Tipe, ID_Prosesor, ID_Ram, ID_Tahun, Stok, Deskripsi, ImgUrl, HargaJual)" +
                        " Values " +
                        "(@NamaBarang, @ID_Tipe, @ID_Prosesor, @ID_Ram, @ID_Tahun, @Stok, @Deskripsi, @ImgUrl, @HargaJual);";

            cnn.Open(); //open connection
            //cnn.Execute("SET FOREIGN_KEY_CHECKS=0;");

            var affectedRows = cnn.Execute
            (sql, new
            {
                NamaBarang = item.NamaBarang,
                ID_Tipe = item.ID_Tipe,
                ID_Prosesor = item.ID_Prosesor,
                ID_Ram = item.ID_Ram,
                ID_Tahun = item.ID_Tahun,
                Stok = item.Stok,
                Deskripsi = item.Deskripsi,
                ImgUrl = item.ImgUrl,
                HargaJual = item.HargaJual
            }
            );

            //cnn.Execute("SET FOREIGN_KEY_CHECKS=1;");
        }

        public int Update(int id, Barang item)
        {
            Barang newItem = item;

            //create query
            string sql = "UPDATE barang SET NamaBarang = '" + item.NamaBarang + "', HargaJual = " + item.HargaJual + ", ID_Tahun = " + item.ID_Tahun +
                        ", ID_Tipe = " + item.ID_Tipe + ", ID_Prosesor = " + item.ID_Prosesor + ", ID_Ram = " + item.ID_Ram + ", Deskripsi = '" + item.Deskripsi + "', ImgUrl = '" + item.ImgUrl +
                        "' WHERE ID = " + id + ";";

            cnn.Open(); //open connection
            var affectedRows = cnn.Execute(sql);
            return affectedRows;
        }

        public int Delete(int id)
        {
            string sql = "DELETE FROM barang WHERE ID = @ID"; //query to execute

            cnn.Open(); //open connection
            //cnn.Execute("SET FOREIGN_KEY_CHECKS=0;");
            var affectedRows = cnn.Execute(sql, new { ID = id }); //execute
            return affectedRows;
            //cnn.Execute("SET FOREIGN_KEY_CHECKS=1;");
        }

        public List<Barang> GetAll()
        {
            string sql = "SELECT * FROM barang;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        } //Get All Barang

        public Barang GetByID(int id)
        {
            string sql = "SELECT * FROM barang WHERE ID = " + id + ";"; //query to execute
            cnn.Open(); //open connection
            Barang temp = cnn.QueryFirst<Barang>(sql);

            return temp;
        } //Get Barang By Id

        public List<Barang> GetByTipe(string tipe)
        {
            cnn.Open(); //open connection

            string sql = "SELECT * FROM `ref. tipe` WHERE Tipe = '@tipe';";
            var temp = cnn.QueryFirst<RefTipe>(sql, new { tipe = tipe });

            sql = "SELECT * FROM barang WHERE ID_Tipe = " + temp.ID + " ORDER BY HargaJual ASC;"; //query to execute

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetByProsesor(string prosesor)
        {
            cnn.Open(); //open connection

            string sql = "SELECT * FROM `ref. prosesor` WHERE Prosesor = @prosesor;";
            var temp = cnn.QueryFirst<RefProsesor>(sql, new { prosesor = prosesor });

            sql = "SELECT * FROM barang WHERE ID_Prosesor = " + temp.ID + " ORDER BY HargaJual ASC;"; //query to execute

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetByRam(string ram)
        {
            cnn.Open(); //open connection

            string sql = "SELECT * FROM `ref. ram` WHERE Ram = @ram;";
            var temp = cnn.QueryFirst<RefProsesor>(sql, new { ram = ram });

            sql = "SELECT * FROM barang WHERE ID_Ram = " + temp.ID + " ORDER BY HargaJual ASC;"; //query to execute

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetByTahun(string tahun)
        {
            cnn.Open(); //open connection

            string sql = "SELECT * FROM `ref. tahun` WHERE Tahun = '@tahun';";
            var temp = cnn.QueryFirst<RefTahun>(sql, new { tahun = tahun });

            sql = "SELECT * FROM barang WHERE ID_Tahun = " + temp.ID + " ORDER BY HargaJual ASC;"; //query to execute

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetByStok(int x, int y)
        {
            string sql = "SELECT * FROM barang WHERE Stok BETWEEN " + x + " AND " + y + " ORDER BY Stok ASC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetByHarga(int x, int y)
        {
            string sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + x + " AND " + y + " ORDER BY HargaJual ASC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> OrderBy(string order)
        {
            cnn.Open();
            string sort = "";

            if (order == "Termurah")
                sort = "HargaJual ASC";
            else if (order == "Termahal")
                sort = "HargaJual DESC";
            else if (order == "Terlama")
                sort = "CAST(TahunRilis AS UNSIGNED), TahunRilis ASC";
            else if (order == "Terbaru")
                sort = "LENGTH(TahunRilis), TahunRilis DESC";

            string sql = "SELECT * FROM barang ORDER BY " + sort + ";";

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList();
                return invoiceItems;
            }

        } //Order Barang By ..

        public List<Barang> GetBySpek(string x)
        {
            string sql = "SELECT * FROM barang WHERE Deskripsi Like '%" + x + "%';"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        //public List<Barang> GetFilter(int hargamin, int hargamax, string tahun, string tipe, string order)
        //{
        //    cnn.Open();
        //    RepoReferensi reporef = new RepoReferensi();
        //    string sort = "", sql;

        //    if (order == "Termurah")
        //        sort = "HargaJual ASC";
        //    else if (order == "Termahal")
        //        sort = "HargaJual DESC";
        //    else if (order == "Terlama")
        //        sort = "ID_Tahun ASC";
        //    else if (order == "Terbaru")
        //        sort = "ID_Tahun DESC";

        //    if (tahun == none && tipe == none) //Harga saja
        //        sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax + " ORDER BY " + sort + ";";
        //    else if (hargamin == 0 && hargamax == 0 && tipe == none) //Tahun saja
        //    {
        //        var temp = reporef.tahunId(tahun);
        //        sql = "SELECT * FROM barang WHERE ID_Tahun = " + temp.ID + " ORDER BY " + sort + ";";
        //    }
        //    else if (hargamin == 0 && hargamax == 0 && tahun == none) //Tipe saja
        //    {
        //        var temp = reporef.tipeId(tipe);
        //        sql = "SELECT * FROM barang WHERE ID_Tipe = " + temp.ID + " ORDER BY " + sort + ";";
        //    }
        //    else if (tipe == none) //Harga + tahun
        //    {
        //        var temp = reporef.tahunId(tahun);
        //        sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
        //            " AND ID_Tahun = " + temp.ID + " ORDER BY " + sort + ";";
        //    }
        //    else if (tahun == none) //Harga + tipe
        //    {
        //        var temp = reporef.tipeId(tipe);
        //        sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
        //            " AND ID_Tipe = " + temp.ID + " ORDER BY " + sort + ";";
        //    }
        //    else if (hargamin == 0 && hargamax == 0) //Tahun + tipe
        //    {
        //        var temp = reporef.tipeId(tipe);
        //        var temp2 = reporef.tahunId(tahun);
        //        sql = "SELECT * FROM barang WHERE ID_Tahun = " + temp2.ID + " AND ID_Tipe = " + temp.ID + " ORDER BY " + sort + ";";
        //    }
        //    else if (hargamin == 0 && hargamax == 0 && tahun == none && tipe == none)
        //    {
        //        sql = "SELECT * FROM barang ORDER BY " + sort + ";";
        //    }
        //    else //Semuanya
        //    {
        //        var temp = reporef.tipeId(tipe);
        //        var temp2 = reporef.tahunId(tahun);
        //        sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
        //            " AND ID_Tahun = " + temp2.ID + " AND ID_Tipe = " + temp.ID + " ORDER BY " + sort + ";";
        //    }

        //    using (var multi = cnn.QueryMultiple(sql))
        //    {
        //        var invoiceItems = multi.Read<Barang>().ToList();
        //        return invoiceItems;
        //    }

        //}

        public List<Barang> SortHargaAsc()
        {
            string sql = "SELECT * FROM barang ORDER BY HargaJual ASC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> SortHargaDesc()
        {
            string sql = "SELECT * FROM barang ORDER BY HargaJual DESC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> SortTahunAsc()
        {
            string sql = "SELECT * FROM barang ORDER BY ID_Tahun ASC;"; //query to execute
            //string sql = "SELECT * FROM barang ORDER BY CAST(TahunRilis AS UNSIGNED), TahunRilis ASC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> SortTahunDesc()
        {
            string sql = "SELECT * FROM barang ORDER ID_Tahun DESC;"; //query to execute
            //string sql = "SELECT * FROM barang ORDER BY LENGTH(TahunRilis), TahunRilis DESC;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Barang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }
        //-------------------//

        //--- CRUD DETIL BARANG ---//
        public void AddStok(List<DetilBarang> item)
        {
            List<DetilBarang> newStok = item;
            int id = newStok.ElementAt(0).ID_Barang;
            string sql;
            //cnn.Open(); //open connection

            foreach (DetilBarang detil in newStok)
            {
                sql = "INSERT INTO `detil barang` (ID_Barang, NoSeri)" +
                        " Values " +
                        "(@ID_Barang, @NoSeri);";
                cnn.Execute(sql, new { ID_Barang = detil.ID_Barang, NoSeri = detil.NoSeri });
            }

            //Update stok
            sql = "UPDATE barang SET Stok = Stok + " + newStok.Count() + " WHERE ID = " + id + ";";
            var affectedRows = cnn.Execute(sql);
        }

        public int DeleteStok(int idBarang, int id)
        {
            string sql = "DELETE FROM `detil barang` WHERE ID = " + id + ";"; //query to execute

            cnn.Open(); //open connection
            var affectedRows = cnn.Execute(sql); //execute

            //Update stok
            sql = "UPDATE barang SET Stok = Stok - 1 WHERE ID = " + idBarang + ";";
            affectedRows += cnn.Execute(sql);

            return affectedRows;
        }

        public List<DetilBarang> GetAllDetilBarang()
        {
            string sql = "SELECT * FROM `detil barang`";
            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<DetilBarang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }

        }

        public List<DetilBarang> GetDetilByID(int id)
        {
            string sql = "SELECT * FROM `detil barang` WHERE ID_Barang = " + id + ";"; //query to execute
            cnn.Open();

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<DetilBarang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<DetilBarang> GetPesanan(int id, int qty)
        {
            string sql = "SELECT * FROM `detil barang` WHERE ID_Barang = " + id + " LIMIT " + qty + ";"; //query to execute
            cnn.Open();

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<DetilBarang>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }
        //-------------------------//
    }
}
