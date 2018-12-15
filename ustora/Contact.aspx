<%@ Page Title="" Language="C#" MasterPageFile="~/ustora.master" AutoEventWireup="true" CodeFile="Contact.aspx.cs" Inherits="Contact" %>

<%@ Register Src="~/search.ascx" TagPrefix="uc1" TagName="search" %>
<%@ Register Src="~/product.ascx" TagPrefix="uc1" TagName="product" %>
<%@ Register Src="~/recentPosts.ascx" TagPrefix="uc1" TagName="recentPosts" %>




<asp:Content ID="Content1" ContentPlaceHolderID="cphTitle" runat="Server">
    Contact
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphBigTitleArea" runat="Server">
    Contact
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphBody" runat="Server">
    <div class="row">
        <div class="col-md-4">
            <uc1:search runat="server" ID="search" />
            <uc1:product runat="server" ID="product" />
            <uc1:recentPosts runat="server" ID="recentPosts" />

        </div>

        <div class="col-md-8">
            <div class="product-content-right">
                <div class="woocommerce">
                    <div class="woocommerce-info">
                        Contact us by filling out the form below:
                    </div>


                    <div enctype="multipart/form-data" class="contact" name="contact">

                        <div id="customer_details" class="col1-set">

                            <p id="contact_first_name_field" class="form-row form-row-first validate-required">
                                <label class="" for="contact_first_name">
                                    First Name
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <input type="text" value="" placeholder="" id="contact_first_name" runat="server" name="contact_first_name" class="input-text ">
                            </p>

                            <p id="contact_last_name_field" class="form-row form-row-last validate-required">
                                <label class="" for="contact_last_name">
                                    Last Name
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <input type="text" runat="server" value="" placeholder="" id="contact_last_name" name="contact_last_name" class="input-text ">
                            </p>
                            <div class="clear"></div>

                            <p id="contact_company_field" class="form-row form-row-wide">
                                <label class="" for="contact_company">Company Name</label>
                                <input type="text" runat="server" value="" placeholder="" id="contact_company" name="contact_company" class="input-text ">
                            </p>

                            <p id="contact_email_field" class="form-row form-row-first validate-required validate-email">
                                <label class="" for="contact_email">
                                    Email Address
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <input type="text" runat="server" value="" placeholder="" id="contact_email" name="contact_email" class="input-text ">
                            </p>

                            <p id="message_field" class="form-row notes">
                                <label class="" for="message">Message:</label>
                                <textarea cols="5" runat="server" rows="2" placeholder="Enter your message here." id="message" class="input-text " name="message"></textarea>
                            </p>

                            <div class="form-row place-order">

                                <input type="submit" onserverclick="submit_ServerClick" runat="server" data-value="Submit" value="Submit" id="submit" class="button alt">

                                <p id="usermessage" runat="server"></p>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</asp:Content>

