using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI.Models;
using WebAPI.Repositories;

namespace WebAPI.Controllers
{
    [Authorize]
    [Produces("application/json")]
    [Route("api/User")]
    public class UserController : Controller
    {
        RepoUser repo = new RepoUser();

        [HttpGet("GetGrosir/{arg1}/{arg2}")]
        public IActionResult GetGrosir(string arg1, string arg2)
        {
            Grosir obj = repo.GetGrosir(arg1, arg2);
            if (obj != null)
                return Ok(obj);
            else
                return NotFound("Aduh ga ada");
        }

        [HttpGet("GetAdmin/{arg1}/{arg2}")]
        public IActionResult GetAdmin(string arg1, string arg2)
        {
            Admin obj = repo.GetUser(arg1, arg2);
            if (obj != null)
                return Ok(obj);
            else
                return NotFound("Aduh ga ada");
        }

        [HttpGet("GetAllGrosir")]
        public IActionResult GetAllGrosir()
        {
            var obj = repo.GetAllGrosir();
            if (obj != null)
                return Ok(obj);
            else
                return NotFound(null);
        }

        [HttpGet("GetGrosirByID/{arg1}")]
        public IActionResult GetGrosirByID(int arg1)
        {
            try
            {
                return Ok(repo.GetGrosirByID(arg1));
            }
            catch (Exception)
            {
                return NotFound(null);
            }
        }

        [HttpPut("Grosir/{arg}")]
        public IActionResult UpdateGrosir(int arg, [FromBody]Grosir item)
        {
            if (repo.updateGrosir(arg, item) > 0)
            {
                return Ok();
            }
            else
            {
                return NoContent();
            }
        }
    }
}