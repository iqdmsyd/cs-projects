using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.IdentityModel.Tokens;
using System;
using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;
using WebAPI.Models;
using WebAPI.Repositories;

namespace WebAPI.Controllers
{
    [Route("api/[controller]")]
    public class TokenController : Controller
    {
        private IConfiguration _config;

        public TokenController(IConfiguration config)
        {
            _config = config;
        }

        //Buat token untuk admin
        [AllowAnonymous]
        [HttpPost("Admin")]
        public IActionResult CreateToken([FromBody]Admin login)
        {
            IActionResult response = Unauthorized();
            var user = Authenticate(login);

            if (user != null)
            {
                var tokenString = BuildToken(user);
                response = Ok(new { token = tokenString });
            }

            return response;
        }

        //Buat token untuk grosir / client
        [AllowAnonymous]
        [HttpPost("Grosir")]
        public IActionResult CreateTokenGrosir([FromBody]Grosir login)
        {
            IActionResult response = Unauthorized();
            var user = AuthenticateGrosir(login);

            if (user != null)
            {
                var tokenString = BuildToken(user);
                response = Ok(new { token = tokenString });
            }

            return response;
        }

        //Buat token
        private string BuildToken(UserModel user)
        {
            var key = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_config["Jwt:Key"]));
            var creds = new SigningCredentials(key, SecurityAlgorithms.HmacSha256);

            var token = new JwtSecurityToken(_config["Jwt:Issuer"],
              _config["Jwt:Issuer"],
              expires: DateTime.Now.AddMinutes(1440),
              signingCredentials: creds);

            return new JwtSecurityTokenHandler().WriteToken(token);
        }

        //Autentikasi admin
        private UserModel Authenticate(Admin login)
        {
            UserModel user = null;
            RepoUser repo = new RepoUser();
            try
            {
                Admin temp = repo.GetUser(login.Username, login.Password);
                user = new UserModel { Name = temp.Username, Time = DateTime.Now };
                return user;
            }
            catch (Exception)
            {
                return user;
            }
        }

        //Autentikasi grosir
        private UserModel AuthenticateGrosir(Grosir login)
        {
            UserModel user = null;
            RepoUser repo = new RepoUser();
            try
            {
                Grosir temp = repo.GetGrosir(login.Email, login.Password);
                user = new UserModel { Name = temp.NamaGrosir, Time = DateTime.Now };
                return user;
            }
            catch (Exception)
            {
                return user;
            }
        }

        private class UserModel
        {
            public string Name { get; set; }
            public DateTime Time { get; set; }
        }
    }
}