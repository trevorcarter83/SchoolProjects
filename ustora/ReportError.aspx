<%@ Page Title="" Language="C#" MasterPageFile="~/ustora.master" AutoEventWireup="true" CodeFile="ReportError.aspx.cs" Inherits="ReportError" %>

<asp:Content ID="Content1" ContentPlaceHolderID="cphTitle" runat="Server">
    Report Error   
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphBigTitleArea" runat="Server">
    Report Error
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphBody" runat="Server">
    <div class="row">
        <div class="col-md-4">
            <div class="single-sidebar">
                <h2 class="sidebar-title">Search Products</h2>
                <div>
                    <input type="text" placeholder="Search products...">
                    <input type="submit" value="Search">
                </div>
            </div>

            <div class="single-sidebar">
                <h2 class="sidebar-title">Products</h2>
                <div class="thubmnail-recent">
                    <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                    <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                    <div class="product-sidebar-price">
                        <ins>$700.00</ins> <del>$100.00</del>
                    </div>
                </div>
                <div class="thubmnail-recent">
                    <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                    <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                    <div class="product-sidebar-price">
                        <ins>$700.00</ins> <del>$100.00</del>
                    </div>
                </div>
                <div class="thubmnail-recent">
                    <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                    <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                    <div class="product-sidebar-price">
                        <ins>$700.00</ins> <del>$100.00</del>
                    </div>
                </div>
                <div class="thubmnail-recent">
                    <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                    <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                    <div class="product-sidebar-price">
                        <ins>$700.00</ins> <del>$100.00</del>
                    </div>
                </div>
            </div>

            <div class="single-sidebar">
                <h2 class="sidebar-title">Recent Posts</h2>
                <ul>
                    <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                    <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                    <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                    <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                    <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                </ul>
            </div>
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
                                <label class="" for="FirstName">
                                    First Name
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <asp:TextBox ID="FirstName" class="input-text " runat="server"></asp:TextBox>
                            </p>

                            <p id="contact_last_name_field" class="form-row form-row-last validate-required">
                                <label class="" for="LastName">
                                    Last Name
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <asp:TextBox ID="LastName" class="input-text " runat="server"></asp:TextBox>
                            </p>
                            <div class="clear"></div>

                            <p id="contact_email_field" class="form-row form-row-first validate-required validate-email">
                                <label class="" for="EmailAddress">
                                    Email Address
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <asp:TextBox ID="EmailAddress" class="input-text " runat="server"></asp:TextBox>
                            </p>

                            <p id="message_field" class="form-row notes">
                                <label class="" for="ErrorDescription">Error Description:</label>
                                <asp:TextBox ID="ErrorDescription" class="input-text " cols="5" Rows="2" placeholder="Enter your message here." runat="server" TextMode="MultiLine" Height="150px"></asp:TextBox>
                            </p>

                            <asp:Calendar ID="DateEncountered" runat="server" BackColor="White" BorderColor="Black" Font-Names="Verdana" Font-Size="9pt" ForeColor="Black" Height="250px" NextPrevFormat="ShortMonth" Width="330px" BorderStyle="Solid" CellSpacing="1">
                                <DayHeaderStyle Font-Bold="True" Font-Size="8pt" ForeColor="#333333" Height="8pt" />
                                <DayStyle BackColor="#CCCCCC" />
                                <NextPrevStyle Font-Size="8pt" ForeColor="White" Font-Bold="True" />
                                <OtherMonthDayStyle ForeColor="#999999" />
                                <SelectedDayStyle BackColor="#333399" ForeColor="White" />
                                <TitleStyle BackColor="#333399" Font-Bold="True" Font-Size="12pt" ForeColor="White" Height="12pt" BorderStyle="Solid" />
                                <TodayDayStyle BackColor="#999999" ForeColor="White" />
                            </asp:Calendar>

                            <div class="form-row place-order">

                                <asp:FileUpload ID="ErrorScreenshot" runat="server" />
                                <asp:Button ID="submit1" runat="server" Text="Button" OnClick="Submit_ServerClick" />
                                <br />

                                <asp:Label ID="usermessage" runat="server"></asp:Label>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</asp:Content>

