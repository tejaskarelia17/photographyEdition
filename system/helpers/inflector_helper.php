<%@ Page Language="C#" AutoEventWireup="true" Inherits="frmViewFeedback" Codebehind="frmViewFeedback.aspx.cs" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Admin Feed Back</title>
    <style type="text/css">
        html
        {
            background: url(images/1.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            
            width: 100%;
            height: 100%;
        }
        .style1
        {
            width: 100%;
            color: #FFFFFF;
        }
        .style2
        {
            width: 87px;
        }
        .style3
        {
            width: 1058px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <table class="style1">
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style3">
                    <asp:Label ID="Label1" runat="server" 
                        style="font-size: xx-large; font-weight: 700; color: #FFFFFF" 
                        Text="All Feedback"></asp:Label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <asp:Image ID="Image1" runat="server" Height="69px" Width="493px" 
                        src="images/Road.png" />
                    <br />
                    <br />
                <asp:LinkButton ID="lnklogout" runat="server" 
                        onclick="LinkButton1_Click" CssClass="style1">Logout</asp:LinkButton>
                    <br />
                    <br />
                    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click1" 
                        style="color: #FFFFFF">Back</asp:LinkButton>
                    <br />
                    <br />
                    <br />
                    Login feed back</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style3" valign="top">
                    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                        CellPadding="4" DataSourceID="SqlDataSource1" ForeColor="#333333" 
                        GridLines="None" Width="1056px">
                        <RowStyle BackColor="#F7F6F3" ForeColor="#333333" />
                        <Columns>
                            <asp:BoundField DataField="name" HeaderText="name" SortExpression="name" />
                            <asp:BoundField DataField="email" HeaderText="email" SortExpression="email" />
                            <asp:BoundField DataField="subject" HeaderText="subject" 
                                SortExpression="subject" />
                            <asp:BoundField DataField="message" HeaderText="message" 
                                SortExpression="message" />
                        </Columns>
                        <FooterStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                        <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
                        <SelectedRowStyle BackColor="#E2DED6" Font-Bold="True" ForeColor="#333333" />
                        <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                        <EditRowStyle BackColor="#999999" />
                        <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
                    </asp:GridView>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                        SelectCommand="SELECT * FROM [Feedback]"></asp:SqlDataSource>
                </td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style3">
                    <br />
                    <br />
                    Website feed back<br />
                    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                        CellPadding="4" DataSourceID="SqlDataSource4" ForeColor="#333333" 
                        GridLines="None">
                        <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
                        <Columns>
                            <asp:BoundField DataField="name" HeaderText="name" SortExpression="name" />
                            <asp:BoundField DataField="email" HeaderText="email" SortExpression="email" />
                            <asp:BoundField DataField="subject" HeaderText="subject" 
                                SortExpression="subject" />
                            <asp:BoundField DataField="message" HeaderText="message" 
                                SortExpression="message" />
                        </Columns>
                        <EditRowStyle BackColor="#999999" />
        