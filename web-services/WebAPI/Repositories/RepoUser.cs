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
    public class RepoUser
    {
        IDbConnection cnn = new MySqlConnection(@"server=localhost;user id=root;database=db_store;SslMode=none");

        public RepoUser()
        {
            cnn.Open();
        }

        public Admin GetUser(string Username, string Password)
        {
            string sql = "SELECT * FROM user WHERE Username = '" + Username + "' AND Password = '" + Password + "';"; //query to execute
            return cnn.QueryFirst<Admin>(sql);
        }

        public Grosir GetGrosir(string Email, string Password)
        {
            string sql = "SELECT * FROM grosir WHERE Email = '" + Email + "' AND Password = '" + Password + "';"; //query to execute
            return cnn.QueryFirst<Grosir>(sql);
        }

        public List<Grosir> GetAllGrosir()
        {
            string sql = "SELECT * FROM grosir";
            return cnn.Query<Grosir>(sql).ToList();
        }

        public Grosir GetGrosirByID(int id)
        {
            string sql = "SELECT * FROM grosir WHERE ID = @ID";
            return cnn.QueryFirst<Grosir>(sql, new { ID = id });
        }

        public int updateGrosir(int id, Grosir item)
        {
            string sql = "UPDATE grosir SET NamaGrosir = '" + item.NamaGrosir + "', Alamat = '" + item.Alamat + "', NamaPemilik = '" + item.NamaPemilik + "', Email = '" + item.Email + "', Password = '" + item.Password + "', NoTelp = '" + item.NoTelp + "' WHERE ID = '" + id + "'";
            return cnn.Execute(sql);
        }

    }
}
