using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.AspNetCore.Mvc.ViewFeatures;

namespace MasterCoreMVC.ViewModels
{    
    public class SideItem
    {
        public string Header { get; set; }
        public string Can { get; set; }
        public string Icon { get; set; }
        public string Name { get; set; }
        public string Link { get; set; }
        public string Target { get; set; }
        public string Class { get; set; }
        public string Onclick { get; set; }
        public string Align { get; set; }
        public string Active { get; set; }
        public BadgeStyle Badge { get; set; }

        public List<SideItem> SubMenu {
            get ; set;
        }
    }
    public class BadgeStyle{
        public string color { get; set; }
        public string text { get; set; }
    }

    public class Breadcrumb{
        public string Can { get; set; }
        public string Icon { get; set; }
        public string Link { get; set; }
        public string Name { get; set; }
        public string Class { get; set; }
        public string Target { get; set; }
        public bool Active { get; set; }
    }

    public class FormInput{
        public ModelExpression For { get; set; }
        public string Type { get; set; } 
        public string Id { get; set; }
        public string Name { get; set; } 
        public bool FormGroup { get; set; } = true;
        public string Value { get; set; } 
        public string Label { get; set; } 
        public bool ShowLabel { get; set; } = true;
        public Dictionary<string, string> Attr { get; set; } 
        public string Class { get; set; } 
        public string Icon { get; set; } 
        public bool Inline { get; set; } = false;
        public string Col { get; set; } 
        public bool Select2 { get; set; } = true;
        public bool Required { get; set; } = false;
        public Dictionary<string, string> Option { get; set; } 

        // signature only
        public string Width { get; set; } 
        public string Height { get; set; } 
        // ['top','bottom','left','right']
        public string Timestamp { get; set; } = "bottom";
        public string Attr_text { 
            get {
                string txt  = "";
                foreach (var item in Attr)
                {
                    txt += item.Key+"=\""+Attr+"\"";
                }
                return txt;
            } 
        }
    }
}