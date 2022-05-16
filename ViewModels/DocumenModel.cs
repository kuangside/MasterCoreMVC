using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace MasterCoreMVC.ViewModels
{
    public class DocumentModel
    {
        [Required]
        [MaxLength(20)]
        public string TestString { get; set; }

        [Required]
        [MaxLength(20)]
        public string TestString2 { get; set; }

        [Required]
        [MaxLength(5)]
        public int TestNumber { get; set; }


        public DateTime TestDateTime { get; set; }

        public List<string> TestList {
            get {
                return new List<string>() {
                    "Test01",
                    "Test02",
                    "Test03",
                    "Test04",
                    "Test05",
                    "Test06",
                };
            }
        }
    }
}