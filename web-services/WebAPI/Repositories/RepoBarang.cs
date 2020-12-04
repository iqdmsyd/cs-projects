using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using WebAPI.Models.Referensi;
using WebAPI.Repositories;
using WebAPI.Models;

namespace WebAPI.Repositories
{
    public class RepoBarang
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");
        string none = "None";

        public RepoBarang()
        {
            cnn.Open(); //open connection
        }

        //--- CRUD BARANG ---//
        public void Insert(Barang item)
        {
            string sql = "INSERT INTO barang (NamaBarang, Tipe, Prosesor, Ram, Tahun, Stok, Deskripsi, ImgUrl, HargaJual)" +
                        " Values " +
                        "(@NamaBarang, @Tipe, @Prosesor, @Ram, @Tahun, @Stok, @Deskripsi, @ImgUrl, @HargaJual);";

            var affectedRows = cnn.Execute
            (sql, new
            {
                NamaBarang = item.NamaBarang,
                Tipe = item.Tipe,
                Prosesor = item.Prosesor,
                Ram = item.Ram,
                Tahun = item.Tahun,
                Stok = item.Stok,
                Deskripsi = item.Deskripsi,
                ImgUrl = item.ImgUrl,
                HargaJual = item.HargaJual
            }
            );
        }

        public int Update(int id, Barang item)
        {
            string sql = "UPDATE barang SET NamaBarang = '" + item.NamaBarang + "', HargaJual = " + item.HargaJual + ", Tahun = '" + item.Tahun +
                        "', Tipe = '" + item.Tipe + "', Prosesor = '" + item.Prosesor + "', Ram = '" + item.Ram + "', Deskripsi = '" + item.Deskripsi + "', ImgUrl = '" + item.ImgUrl +
                        "' WHERE ID = " + id + ";";

            var affectedRows = cnn.Execute(sql);
            return affectedRows;
        }

        public int Delete(int id)
        {
            string sql = "DELETE FROM barang WHERE ID = @ID";
            var affectedRows = cnn.Execute(sql, new { ID = id }); //execute
            sql = "DELETE FROM `detil barang` WHERE ID_Barang = '" + id + "';";
            var row = cnn.Execute(sql);
            return affectedRows;
        }

        public List<Dictionary> GetDictionary()
        {
            string sql = "SELECT COLUMN_NAME AS 'Name', COLUMN_KEY AS 'Key', COLUMN_TYPE AS 'Type', IS_NULLABLE AS 'IsNullable' FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'barang'";

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Dictionary>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Barang> GetAll()
        {
            string sql = "SELECT * FROM barang;";
            return cnn.Query<Barang>(sql).ToList();
        }

        public Barang GetByID(int id)
        {
            string sql = "SELECT * FROM barang WHERE ID = " + id + ";";
            return cnn.QueryFirst<Barang>(sql);
        }

        public List<Barang> GetByTipe(string tipe, string order)
        {
            string sql = "SELECT * FROM barang WHERE Tipe = '" + tipe + "' ORDER BY " + order + ";";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetByProsesor(string prosesor, string order)
        {
            string sql = "SELECT * FROM barang WHERE Prosesor = '" + prosesor + "' ORDER BY " + order + ";";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetByRam(string ram, string order)
        {
            string sql = "SELECT * FROM barang WHERE Ram = '" + ram + "' ORDER BY " + order + ";";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetByTahun(string tahun, string order)
        {
            string sql = "SELECT * FROM barang WHERE Tahun = '" + tahun + "' ORDER BY " + order + ";"; //query to execute
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetByStok(int x, int y, string order)
        {
            string sql = "SELECT * FROM barang WHERE Stok BETWEEN " + x + " AND " + y + " ORDER BY " + order + ";"; //query to execute
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetByHarga(int x, int y, string order)
        {
            string sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + x + " AND " + y + " ORDER BY " + order + ";"; //query to execute
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> OrderBy(string order)
        {
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

            return cnn.Query<Barang>(sql).ToList();

        }

        public List<Barang> GetBySpek(string x)
        {
            string sql = "SELECT * FROM barang WHERE Deskripsi Like '%" + x + "%';"; //query to execute
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> GetFilter(int hargamin, int hargamax, string tahun, string tipe, string order)
        {
            string sort = "", sql;

            if (order == "Termurah")
                sort = "HargaJual ASC";
            else if (order == "Termahal")
                sort = "HargaJual DESC";
            else if (order == "Terlama")
                sort = "Tahun ASC";
            else if (order == "Terbaru")
                sort = "Tahun DESC";

            if (tahun == none && tipe == none) //Harga saja
                sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax + " ORDER BY " + sort + ";";
            else if (hargamin == 0 && hargamax == 0 && tipe == none) //Tahun saja
            {
                sql = "SELECT * FROM barang WHERE Tahun = '" + tahun + "' ORDER BY " + sort + ";";
            }
            else if (hargamin == 0 && hargamax == 0 && tahun == none) //Tipe saja
            {
                sql = "SELECT * FROM barang WHERE Tipe = '" + tipe + "' ORDER BY " + sort + ";";
            }
            else if (tipe == none) //Harga + tahun
            {
                sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
                    " AND Tahun = '" + tahun + "' ORDER BY " + sort + ";";
            }
            else if (tahun == none) //Harga + tipe
            {
                sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
                    " AND Tipe = '" + tipe + "' ORDER BY " + sort + ";";
            }
            else if (hargamin == 0 && hargamax == 0) //Tahun + tipe
            {
                sql = "SELECT * FROM barang WHERE Tahun = '" + tahun + "' AND Tipe = '" + tipe + "' ORDER BY " + sort + ";";
            }
            else if (hargamin == 0 && hargamax == 0 && tahun == none && tipe == none)
            {
                sql = "SELECT * FROM barang ORDER BY " + sort + ";";
            }
            else //Semuanya
            {

                sql = "SELECT * FROM barang WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax +
                    " AND Tahun = '" + tahun + "' AND Tipe = '" + tipe + "' ORDER BY " + sort + ";";
            }

            return cnn.Query<Barang>(sql).ToList();

        }

        public List<Barang> GetSearch(int id, string tipe, string ram, string tahun, string prosesor, int stokmin, int stokmax, int hargamin, int hargamax, string order, string nama)
        {
            string sort = "", sql;

            if (order == "Termurah")
                sort = "HargaJual asc";
            else if (order == "Termahal")
                sort = "HargaJual desc";
            else if (order == "Terlama")
                sort = "Tahun asc";
            else if (order == "Terbaru")
                sort = "Tahun desc";
            else if (order == "Terbanyak")
                sort = "Stok desc";
            else if (order == "Tersedikit")
                sort = "Stok asc";


            //Cobaan
            sql = "SELECT * FROM barang ";

            if (id != 0)
            {
                sql = sql + "WHERE ID = " + id + ";";
                return cnn.Query<Barang>(sql).ToList();
            }

            if (nama != none)
            {
                sql = sql + "WHERE NamaBarang LIKE '%" + nama + "%';";
                return cnn.Query<Barang>(sql).ToList();
            }
            
            int cek = 0;

            if (tipe != none)
            {
                sql = sql + "WHERE Tipe = '" + tipe + "' ";
                cek = 1;
            }

            if (ram != none && cek == 1)
            {
                sql = sql + "AND Ram = '" + ram + "' ";
            }
            else if (ram != none && cek == 0)
            {
                sql = sql + "WHERE Ram = '" + ram + "' ";
                cek = 1;
            }

            if (tahun != none && cek == 1)
            {
                sql = sql + "AND Tahun = '" + tahun + "' ";
            }
            else if (tahun != none && cek == 0)
            {
                sql = sql + "WHERE Tahun = '" + tahun + "' ";
                cek = 1;
            }

            if (prosesor != none && cek == 1)
            {
                sql = sql + "AND Prosesor = '" + prosesor + "' ";
            }
            else if (prosesor != none && cek == 0)
            {
                sql = sql + "WHERE Prosesor = '" + prosesor + "' ";
                cek = 1;
            }

            if (stokmax != 0 && cek == 1)
            {
                sql = sql + "AND Stok BETWEEN "+stokmin+" AND "+stokmax+" ";
            }
            else if (stokmax != 0 && cek == 0)
            {
                sql = sql + "WHERE Stok BETWEEN " + stokmin + " AND " + stokmax + " ";
                cek = 1;
            }

            if (hargamax != 0 && cek == 1)
            {
                sql = sql + "AND HargaJual BETWEEN " + hargamin + " AND " + hargamax + " ";
            }
            else if (hargamax != 0 && cek == 0)
            {
                sql = sql + "WHERE HargaJual BETWEEN " + hargamin + " AND " + hargamax + " ";
                cek = 1;
            }

            if (order != none)
            {
                sql = sql + "ORDER BY " + sort + ";";
            }

            return cnn.Query<Barang>(sql).ToList();

        }

        public List<Barang> SortHargaAsc()
        {
            string sql = "SELECT * FROM barang ORDER BY HargaJual ASC;";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> SortHargaDesc()
        {
            string sql = "SELECT * FROM barang ORDER BY HargaJual DESC;";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> SortTahunAsc()
        {
            string sql = "SELECT * FROM barang ORDER BY Tahun ASC;";
            return cnn.Query<Barang>(sql).ToList();
        }

        public List<Barang> SortTahunDesc()
        {
            string sql = "SELECT * FROM barang ORDER Tahun DESC;";
            return cnn.Query<Barang>(sql).ToList();
        }
        //-------------------//

        //--- CRUD DETIL BARANG ---//
        public int AddStok(DetilBarang item)
        {
            var temp = cnn.QueryFirstOrDefault<DetilBarang>("SELECT * FROM `detil barang` WHERE ID_Barang = " + item.ID_Barang + " AND NoSeri = '" + item.NoSeri + "'; ");

            if (temp == null)
            {
                string sql = "INSERT INTO `detil barang` (ID_Barang, NoSeri) Values (@ID_Barang, @NoSeri);";
                var affectedRows = cnn.Execute(sql, new { ID_Barang = item.ID_Barang, NoSeri = item.NoSeri });

                sql = "UPDATE barang SET Stok = Stok + " + 1 + " WHERE ID = " + item.ID_Barang + ";";
                affectedRows = cnn.Execute(sql);

                return affectedRows;
            }

            return 0;
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
            return cnn.Query<DetilBarang>(sql).ToList();
        }

        public List<DetilBarang> GetDetilByID(int id)
        {
            string sql = "SELECT * FROM `detil barang` WHERE ID_Barang = " + id + ";"; //query to execute
            return cnn.Query<DetilBarang>(sql).ToList();
        }

        public List<DetilBarang> GetPesanan(int id, int qty)
        {
            string sql = "SELECT * FROM `detil barang` WHERE ID_Barang = " + id + " LIMIT " + qty + ";"; //query to execute

            return cnn.Query<DetilBarang>(sql).ToList();
        }
        //-------------------------//
    }
}
