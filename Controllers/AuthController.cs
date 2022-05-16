using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MasterCoreMVC.Models;
using MasterCoreMVC.ViewModels;
using MasterCoreMVC.Data;
using Microsoft.AspNetCore.Authentication;
using Microsoft.AspNetCore.Authentication.Cookies;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using System.Security.Claims;
using Microsoft.EntityFrameworkCore;
using System.ComponentModel.DataAnnotations;

namespace MasterCoreMVC.Controllers
{
    public class AuthController : Controller
    {
        private readonly ApplicationDbContext _context;

        public AuthController(ApplicationDbContext context)
        {
            _context = context;
        }

        [HttpGet]
        [AllowAnonymous]
        public IActionResult Login(string RetuenUrl="")
        {
            ViewData["RetuenUrl"] = RetuenUrl;
            return View(new LoginInput());
        }

        [HttpPost]
        [AllowAnonymous]
        public async Task<IActionResult> Login(LoginInput Input, string RetuenUrl="/")
        {
            var data = await _context.AppUser.FirstOrDefaultAsync(a=>a.username == Input.username && a.password == Input.password);
            if(data != null){
                var claims = new List<Claim>();
                claims.Add(new Claim(ClaimTypes.NameIdentifier, data.id.ToString()));
                claims.Add(new Claim(ClaimTypes.Name, data.name));
                claims.Add(new Claim("username", data.username));
                claims.Add(new Claim("isactive", Convert.ToInt16(data.isactive).ToString()));
                foreach (var item in data.rolelist)
                {
                    claims.Add(new Claim(ClaimTypes.Role, item));                    
                }
                var claimsIdentity = new ClaimsIdentity(
                    claims, 
                    CookieAuthenticationDefaults.AuthenticationScheme);

                await HttpContext.SignInAsync(
                    CookieAuthenticationDefaults.AuthenticationScheme, 
                    new ClaimsPrincipal(claimsIdentity));
                TempData["success"] = "เข้าสู่ระบบสำเร็จ";
                return Redirect(RetuenUrl);
            }
            TempData["error"] = "Username Or Password Invalid!";
            return View("Login");
        }

        [HttpPost]
        [Authorize]
        public async Task<IActionResult> Logout()
        {
            await HttpContext.SignOutAsync(CookieAuthenticationDefaults.AuthenticationScheme);
            return RedirectToAction("Login");
        }

        [HttpGet]
        [Authorize]
        public IActionResult Profile()
        {
            return View();
        }

        [HttpPost]
        [Authorize]
        public IActionResult Profile(ProfileInput Input)
        {
            return RedirectToAction("Profile");
        }

        [HttpPost]
        [Authorize]
        public IActionResult ResetPassword()
        {
            return Redirect(Request.Headers["Referer"].ToString());
        }
    }
}

public class LoginInput
{
    [Required]
    [MaxLength(20)]
    public string username { get; set; }
    [Required]
    [MaxLength(20)]
    public string password { get; set; }
}

public class ProfileInput
{
    public int id { get; set; }
    [Required]
    [MaxLength(20)]
    public string username { get; set; }
    public string password { get; set; }
    public string password_confirm { get; set; }
    [Required]
    [MaxLength(20)]
    public string name { get; set; }
    [Required]
    [MaxLength(100)]
    public string roles { get; set; }
    public bool isactive { get; set; }
}