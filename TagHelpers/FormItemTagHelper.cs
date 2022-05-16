using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.AspNetCore.Mvc.ViewFeatures;
using Microsoft.AspNetCore.Razor.TagHelpers;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace MasterCoreMVC.TagHelpers
{

    [HtmlTargetElement("formitem")]
    public class FormItemTagHelper : TagHelper
    {
        public string Type { get; set; } 
        public string Id { get; set; }
        public string Name { get; set; } 
        public bool FormGroup { get; set; } = true;
        public string Value { get; set; } 
        public string Label { get; set; } 
        public bool ShowLabel { get; set; } = true;
        public string Class { get; set; } 
        public string Icon { get; set; } 
        public bool Inline { get; set; } = false;
        public string Col { get; set; } 
        public bool Select2 { get; set; } = true;
        public bool Required { get; set; } = false;

        private readonly IHtmlGenerator _generator;
        [ViewContext]
        public ViewContext ViewContext { get; set; }
        [HtmlAttributeName("asp-for")]
        public ModelExpression For { get; set; }

        public FormItemTagHelper(IHtmlGenerator generator)
        {
            _generator = generator;
        }

        public override void Process(TagHelperContext context, TagHelperOutput output)
        {
            output.SuppressOutput();
            output.Content.Clear();

            string addAttribute = extraAttribute(context);
            
            // var props = this.GetType().GetProperties().Select(p => p.Name);
            var input = CreateInput(For,context);
            if(Required) input.Attributes["required"] = "true";
            // ========= set type input ==============
            if(Type.ToLower() == "date") {
                input.Attributes["class"] = "form-control datepicker";
                if(string.IsNullOrEmpty(Icon)){
                    Icon = "bi bi-calendar-week";
                }
            }
            input.AddCssClass(Class);
            
            
            //// ================ output =======================================
            output.TagName = "";
            output.Content.AppendHtml(@$"<div class='{Col}'>");
            output.Content.AppendHtml(@$"<div class='{(FormGroup == true ? "form-group" : "")}'>");
            if(ShowLabel && Inline==false) output.Content.AppendHtml(CreateHtmlLabel(Label ?? Name ?? For.Name));
            if(!string.IsNullOrEmpty(Icon) || Inline) output.Content.AppendHtml(@$"<div class='input-group input-group-inline'>");
            if(ShowLabel && Inline==true) output.Content.AppendHtml(CreateHtmlLabel(Label ?? Name ?? For.Name));

            // input 
            output.Content.AppendHtml(input);


            if(!string.IsNullOrEmpty(Icon)) output.Content.AppendHtml(CreateHtmlIcon(Icon));
            if(!string.IsNullOrEmpty(Icon) || Inline) output.Content.AppendHtml("</div>");
            output.Content.AppendHtml(Createvalidation(For));
            output.Content.AppendHtml("</div>");
            output.Content.AppendHtml("</div>");
        }

        private TagBuilder CreateInput(ModelExpression _For, TagHelperContext _context){
            TagBuilder input = new TagBuilder("input");
            if(_For!=null){
                input = _generator.GenerateTextBox(ViewContext,
                        _For.ModelExplorer,
                        _For.Name,
                        _For.Model,
                        null,
                        new { @class = "form-control",@id= Id });
            }else{
                input.Attributes["id"] = Id;
                input.Attributes["class"] = "form-control";
                input.Attributes["type"] = Type;
                input.Attributes["name"] = Name;
                input.Attributes["value"] = Value;
            }
            // ------------------- Begin Extra Attributes --------------------
            var attributeObjects = _context.AllAttributes.ToList();
            var props = this.GetType().GetProperties().Select(p => p.Name.Replace("_","").ToLower());
            attributeObjects.RemoveAll(a => props.Contains(a.Name.Replace("-","").ToLower()));
            foreach (var attr in attributeObjects)
            {
                if(attr.Name != "asp-for"){
                    input.Attributes[attr.Name] = attr.Value.ToString();
                }
            }            
            // ------------------- End Extra Attributes --------------------
            return input;
        }

        private TagBuilder Createvalidation(ModelExpression _For){
            TagBuilder validationMsg = null;
            if(_For != null){
                validationMsg = _generator.GenerateValidationMessage(
                    ViewContext,
                    _For.ModelExplorer,
                    _For.Name,
                    null,
                    ViewContext.ValidationMessageElement,
                    new { @class = "help-block text-danger" });
            }
            return validationMsg;
        }

        private string CreateHtmlIcon (string _Icon="") {
            return @$"<label class=""mb-0 input-group-append"" for=""{Id}"">
                <div class=""input-group-text"">
                    <i class=""{_Icon}""></i>
                </div>
            </label>";
        }

        private string CreateHtmlLabel (string _Label="") {
            var txtclass = "control-label";
            if(Inline) txtclass = "input-group-append form-item-inline";
            var txtRequired = "";
            if(Required) txtRequired = "<span class='text-danger required-text'>*</span>";
            return @$"<label class=""{txtclass}"" for=""{Id}"">
                {txtRequired}{_Label}: 
            </label>";
        }

        private string extraAttribute(TagHelperContext _context){
            // ------------------- Begin Extra Attributes --------------------

            var attributeObjects = _context.AllAttributes.ToList();

            var props = this.GetType().GetProperties().Select(p => p.Name);

            attributeObjects.RemoveAll(a => props.Contains(a.Name));

            var extraAttributeList = new List<string>();

            foreach (var attr in attributeObjects)
            {
                extraAttributeList.Add($"{attr.Name}=\"{attr.Value}\"");
            }                                                                                                 

            // ------------------- End Extra Attributes --------------------
            return string.Join(" ", extraAttributeList);
        }
    }
}