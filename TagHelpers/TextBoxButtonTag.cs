using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.AspNetCore.Razor.TagHelpers;

namespace MasterCoreMVC.TagHelpers
{

    [HtmlTargetElement("input", Attributes = "add-on-button,add-on-button-text,add-on-button-icon,add-on-append")]
    public class TextBoxButtonTag : TagHelper
    {
        public string AddOnButton { get; set; }
        public string AddOnButtonText { get; set; }
        public string AddOnButtonIcon { get; set; }
        public bool AddOnAppend { get; set; }

        public override void Process(TagHelperContext context, TagHelperOutput output)
        {
            var tagSpan = new TagBuilder("span");
            tagSpan.AddCssClass(AddOnAppend ? "input-group-append" : "input-group-prepend");

            var tagButton = new TagBuilder("button");
            tagButton.Attributes.Add("id", AddOnButton);
            tagButton.Attributes.Add("class", "btn btn-light");
            tagButton.Attributes.Add("type", "button");

            if (!string.IsNullOrEmpty(AddOnButtonIcon))
            {
                var tagButtonIcon = new TagBuilder("i");
                tagButtonIcon.Attributes.Add("class", string.Concat("ti-search", string.IsNullOrEmpty(AddOnButtonText) ? "" : " pr-1"));
                tagButtonIcon.Attributes.Add("style", "vertical-align: middle");
                tagButton.InnerHtml.AppendHtml(tagButtonIcon);
            }

            tagButton.InnerHtml.AppendHtml(AddOnButtonText);


            tagSpan.InnerHtml.AppendHtml(tagButton);

            output.PreElement.AppendHtml(@"<div class='input-group'>");
            if (AddOnAppend)
                output.PostElement.AppendHtml(tagSpan);
            else
                output.PreElement.AppendHtml(tagSpan);
            output.PostElement.AppendHtml("</div>");
        }
    }
}