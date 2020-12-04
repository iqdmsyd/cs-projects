using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using WebAPI.Models;
using WebAPI.Models.Referensi;

namespace WebAPI.Repositories
{
    public class RepoTransaksi
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");
        string none = "None";

        public RepoTransaksi()
        {
            cnn.Open();
        }

        //--- CRUD TRANSAKSI ---//
        public void Insert(Transaksi item)
        {
            Transaksi newItem = item;
            int total = 0, qty = 0;
            string sql;

            //buat transaksi baru
            sql = "INSERT INTO transaksi (ID_Grosir, TanggalTransaksi, Qty, TotalBayar)" +
                        " Values " +
                        "(@ID_Grosir, @TanggalTransaksi, @Qty, @TotalBayar);";

            var affectedrows = cnn.Execute
                (sql, new
                {
                    ID_Grosir = item.ID_Grosir,
                    TanggalTransaksi = item.TanggalTransaksi,
                    Qty = item.Qty,
                    TotalBayar = item.TotalBayar
                }
                );
        }

        public void Update(int id, Transaksi item)
        {
            Transaksi newItem = item;

            //create query
            string sql = "UPDATE transaksi SET ID = @ID, ID_Grosir = @ID_Grosir, TanggalTransaksi = @TanggalTransaksi," +
                        " Qty = @Qty, TotalBayar = @TotalBayar" +
                        " WHERE ID = @ID;";

            var affectedRows = cnn.Execute
            (sql, new
            {
                ID = item.ID,
                ID_Grosir = item.ID_Grosir,
                TanggalTransaksi = item.TanggalTransaksi,
                Qty = item.Qty,
                TotalBayar = item.TotalBayar
            }
            );
        }

        public void Delete(int id)
        {
            string sql = "DELETE FROM transaksi WHERE ID = @ID"; //query to execute
            var affectedRows = cnn.Execute(sql, new { ID = id }); //execute
        }

        public List<Transaksi> GetAll()
        {
            string sql = "SELECT * FROM transaksi;"; //query to execute
            return cnn.Query<Transaksi>(sql).ToList();
        }

        public Transaksi GetByID(int id)
        {
            string sql = "SELECT * FROM transaksi WHERE ID = " + id + ";"; //query to execute
            return cnn.QueryFirst<Transaksi>(sql);
        }

        public Transaksi GetByGrosirNew(int id)
        {
            string sql = "SELECT * FROM transaksi WHERE ID_Grosir = " + id + " ORDER BY TanggalTransaksi DESC LIMIT 1;"; //query to execute
            return cnn.QueryFirst<Transaksi>(sql);
        }

        public List<Transaksi> GetByIDGrosir(int id)
        {
            string sql = "SELECT * FROM transaksi WHERE ID_Grosir = " + id + " ORDER BY TanggalTransaksi DESC;"; //query to execute
            return cnn.Query<Transaksi>(sql).ToList();
        }

        public List<Transaksi> GetByHarga(int hargamin, int hargamax)
        {
            string sql = "SELECT * FROM transaksi WHERE TotalBayar BETWEEN " + hargamin + " AND " + hargamax + ";"; //query to execute
            return cnn.Query<Transaksi>(sql).ToList();
        }

        public List<Transaksi> GetByQty(int qtymin, int qtymax)
        {
            string sql = "SELECT * FROM transaksi WHERE Qty BETWEEN " + qtymin + " AND " + qtymax + ";"; //query to execute
            return cnn.Query<Transaksi>(sql).ToList();
        }

        public List<Transaksi> GetByTanggal(DateTime tglmin, DateTime tglmax)
        {
            string sql = "SELECT * FROM transaksi WHERE TanggalTransaksi >= '" + tglmin + "' AND TanggalTransaksi <= '" + tglmax + "';"; //query to execute
            return cnn.Query<Transaksi>(sql).ToList();
        }

        public List<Transaksi> GetBy(int id, string order)
        {
            string sort = "", sql;

            if (order == "Termurah")
                sort = "TotalBayar ASC";
            else if (order == "Termahal")
                sort = "TotalBayar DESC";
            else if (order == "Tersedikit")
                sort = "Qty ASC";
            else if (order == "Terbanyak")
                sort = "Qty DESC";
            else if (order == "Terlama")
                sort = "TanggalTransaksi ASC";
            else if (order == "Terbaru")
                sort = "TanggalTransaksi DESC";

            sql = "SELECT * FROM transaksi ";

            if (id != 0)
            {
                sql = sql + "WHERE ID = " + id + ";";
                return cnn.Query<Transaksi>(sql).ToList();
            }

            if (order != none)
            {
                sql = sql + "ORDER BY " + sort + ";";
            }

            return cnn.Query<Transaksi>(sql).ToList();
        }
        //----------------------//


        //--- CRUD DETIL TRANSAKSI ---//
        public void InsertDetil(int idgrosir, List<DetilTransaksi> items)
        {
            string sql;
            int total = 0, qty = 0;

            //dapatkan id transaksi
            var trans = cnn.QueryFirst<Transaksi>("SELECT * FROM transaksi WHERE ID_Grosir = " + idgrosir + " ORDER BY ID DESC LIMIT 1");

            //RepoBarang repoBrg = new RepoBarang();
            //List<Barang> list = repoBrg.GetAll();

            //int[] arr = new int[100];

            //masukan list detil transaksi
            foreach (DetilTransaksi trs in items)
            {
                sql = "INSERT INTO `detil transaksi` (ID_Transaksi, ID_Barang, NoSeri, HargaJual)" +
                        " Values " +
                        "(@ID_Transaksi, @ID_Barang, @NoSeri, @HargaJual);";
                cnn.Execute(sql, new { ID_Transaksi = trans.ID, ID_Barang = trs.ID_Barang, NoSeri = trs.NoSeri, HargaJual = trs.HargaJual });
                total += trs.HargaJual; //hitung total yang harus dibayar
                qty++; //hitung kuantitas barang yg dibeli
            }

            //hapus di stok barang
            foreach (DetilTransaksi trs in items)
            {
                sql = "DELETE FROM `detil barang` WHERE ID_Barang = " + trs.ID_Barang + " AND NoSeri = '" + trs.NoSeri + "';";
                cnn.Execute(sql);
            }

            //edit di barang
            foreach (DetilTransaksi trs in items)
            {
                sql = "UPDATE barang SET Stok = Stok - 1 WHERE ID = " + trs.ID_Barang + ";";
                cnn.Execute(sql);
            }

            //update transaksi (qty dan total)
            var affectedRows = cnn.Execute("UPDATE transaksi SET Qty = " + qty + ", TotalBayar = " + total + " WHERE ID = " + trans.ID + ";");

        }

        public List<DetilTransaksi> GetAllDetil()
        {
            string sql = "SELECT * FROM `detil transaksi`;"; //query to execute
            return cnn.Query<DetilTransaksi>(sql).ToList();
        }

        public List<DetilTransaksi> DetilByIDTransaksi(int id)
        {
            string sql = "SELECT * FROM `detil transaksi` WHERE ID_Transaksi = " + id +  ";"; //query to execute
            return cnn.Query<DetilTransaksi>(sql).ToList();
        }

        public List<DetilTransaksi> DetilByIDGrosirNew(int id)
        {
            string sql = "SELECT * FROM transaksi WHERE ID_Grosir = " + id + " ORDER BY ID DESC LIMIT 1;";
            Transaksi trans = cnn.QueryFirst<Transaksi>(sql);

            sql = "SELECT * FROM `detil transaksi` WHERE ID_Transaksi = " + trans.ID + ";";
            return cnn.Query<DetilTransaksi>(sql).ToList();
        }
        //----------------------------//


    }
}
