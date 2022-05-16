using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MasterCoreMVC.Models;
using MasterCoreMVC.ViewModels;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace MasterCoreMVC.Controllers
{
    public class DocController : Controller
    {
        [Authorize]
        public IActionResult Index()
        {            
            return View(new DocumentModel(){ TestString="MANANA",TestString2="babaraga" });
        }
    }
}