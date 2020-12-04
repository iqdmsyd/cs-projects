using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using WebAPI.Models;

namespace WebAPI.Repositories
{
    public class RepoDictionary
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");

        public RepoDictionary()
        {
            cnn.Open();
        }

        public List<Dictionary> Barang()
        {
            string sql = "SELECT COLUMN_NAME AS 'Name', COLUMN_KEY AS 'Key', COLUMN_TYPE AS 'Type', IS_NULLABLE AS 'IsNullable' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_store' AND TABLE_NAME = 'barang';";
            return cnn.Query<Dictionary>(sql).ToList();
        }

        public List<Dictionary> Transaksi()
        {
            string sql = "SELECT COLUMN_NAME AS 'Name', COLUMN_KEY AS 'Key', COLUMN_TYPE AS 'Type', IS_NULLABLE AS 'IsNullable' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_store' AND TABLE_NAME = 'transaksi';";
            return cnn.Query<Dictionary>(sql).ToList();
        }

        public List<Dictionary> DetilBarang()
        {
            string sql = "SELECT COLUMN_NAME AS 'Name', COLUMN_KEY AS 'Key', COLUMN_TYPE AS 'Type', IS_NULLABLE AS 'IsNullable' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_store' AND TABLE_NAME = 'detil barang';";
            return cnn.Query<Dictionary>(sql).ToList();
        }

        public List<Dictionary> DetilTransaksi()
        {
            string sql = "SELECT COLUMN_NAME AS 'Name', COLUMN_KEY AS 'Key', COLUMN_TYPE AS 'Type', IS_NULLABLE AS 'IsNullable' FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db_store' AND TABLE_NAME = 'detil transaksi';";
            return cnn.Query<Dictionary>(sql).ToList();
        }
    }
}
