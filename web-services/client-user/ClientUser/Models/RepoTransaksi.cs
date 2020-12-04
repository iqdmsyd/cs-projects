using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using MySql.Data.MySqlClient;

namespace ClientUser.Models
{
    public class RepoTransaksi
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_toko;SslMode=none");

        public List<Transaksi> GetAll()
        {
            string sql = "SELECT * FROM transaksi;"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Transaksi>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public Transaksi GetByID(int id)
        {
            string sql = "SELECT * FROM transaksi WHERE ID = " + id + ";"; //query to execute

            cnn.Open(); //open connection
            Transaksi temp = cnn.QueryFirst<Transaksi>(sql);

            return temp;
        }

        public List<Transaksi> GetByGrosir(string grosir)
        {
            cnn.Open(); //open connection

            string sql = "SELECT * FROM `grosir` WHERE NamaGrosir = @grosir;";
            var temp = cnn.QueryFirst<Grosir>(sql, new { grosir = grosir });

            sql = "SELECT * FROM transaksi WHERE ID_Grosir = '" + temp.ID + "';"; //query to execute

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Transaksi>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }

        public List<Transaksi> GetByTotal(int x, int y)
        {
            string sql = "SELECT * FROM transaksi WHERE TotalBayar BETWEEN " + x + " AND " + y + ";"; //query to execute

            cnn.Open(); //open connection

            using (var multi = cnn.QueryMultiple(sql))
            {
                var invoiceItems = multi.Read<Transaksi>().ToList(); //retrieve data from database convert to list of Parts
                return invoiceItems;
            }
        }
    }
}
