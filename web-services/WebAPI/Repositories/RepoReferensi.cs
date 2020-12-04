using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using Dapper;
using WebAPI.Models.Referensi;
using WebAPI.Models;

namespace WebAPI.Repositories
{
    public class RepoReferensi
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");

        public RepoReferensi()
        {
            cnn.Open();
        }

        public List<RefTipe> GetAllTipe()
        {
            string sql = "SELECT * FROM `ref. tipe`;"; //query to execute
            return cnn.Query<RefTipe>(sql).ToList();
        }

        public List<RefProsesor> GetAllProsesor()
        {
            string sql = "SELECT * FROM `ref. prosesor`;"; //query to execute
            return cnn.Query<RefProsesor>(sql).ToList();
        }

        public List<RefRam> GetAllRam()
        {
            string sql = "SELECT * FROM `ref. ram`;"; //query to execute
            return cnn.Query<RefRam>(sql).ToList();
        }

        public List<RefTahun> GetAllTahun()
        {
            string sql = "SELECT * FROM `ref. tahun`;"; //query to execute
            return cnn.Query<RefTahun>(sql).ToList();
        }

        public int addTipe(RefTipe item)
        {
            if (cnn.QueryFirstOrDefault<RefTipe>("SELECT * FROM `ref. tipe` WHERE Tipe = '" + item.Tipe + "';") == null)
            {
                string sql = "INSERT INTO `ref. tipe`(Tipe) VALUES ('" + item.Tipe + "')";
                return cnn.Execute(sql);
            }
            return 0;
            
        }

        public int addProsesor(RefProsesor item)
        {
            if (cnn.QueryFirstOrDefault<RefProsesor>("SELECT * FROM `ref. prosesor` WHERE Prosesor = '" + item.Prosesor + "';") == null)
            {
                string sql = "INSERT INTO `ref. prosesor`(Prosesor) VALUES ('" + item.Prosesor + "')";
                return cnn.Execute(sql);
            }
            return 0;
            
        }

        public int addRam(RefRam item)
        {
            if (cnn.QueryFirstOrDefault<RefRam>("SELECT * FROM `ref. ram` WHERE Ram = '" + item.Ram + "';") == null)
            {
                string sql = "INSERT INTO `ref. ram`(Ram) VALUES ('" + item.Ram + "')";
                return cnn.Execute(sql);
            }
            return 0;
            
        }

        public int addTahun(RefTahun item)
        {
            if (cnn.QueryFirstOrDefault<RefTahun>("SELECT * FROM `ref. tahun` WHERE Tahun = '" + item.Tahun + "';") == null)
            {
                string sql = "INSERT INTO `ref. tahun`(Tahun) VALUES ('" + item.Tahun + "')";
                return cnn.Execute(sql);
            }
            return 0;
            
        }
    }
}
