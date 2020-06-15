<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8">
	<title> Memo </title>
	<style>
		input[type=submit] {
		    background: url(send.png);
		    border: 0;
		    display: block;
		    height: _the_image_height;
		    width: _the_image_width;
		}
	</style>
	<script language="javascript" type="text/javascript" src="js/jquery-1.12.3.js"></script>
	<script language="javascript" type="text/javascript" src="tinymcpuk/tiny_mce_src.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=500,height=400");
	}
</script>
</head>
<body>
	<h2 align="center"> MEMO </h2>
	<form action="mail.php" method="POST" enctype='multipart/form-data'>
		<table align="center" style="border: 1px solid gray;">
			<tr>
				<td colspan="5"><input type='image' src='send.png' alt="Send" width="50px" height="50px" title="Kirim"><br> </td>
			</tr>
			<tr>
				<td> SMTP Server </td> 
				<td> : </td> 
				<td> <input type="text" name="host" placeholder="Contoh : smtp.google.com"> </td>
			</tr>
			<tr>
				<td> SMTP Port </td> 
				<td> : </td> 
				<td> <input type="text" name="port" placeholder="Contoh : 587"> </td>
			</tr>
			<tr>
				<td> SMTP Secure </td> 
				<td> : </td> 
				<td> <input type="text" name="smtpsecure" placeholder="Contoh : tls"> </td>
			</tr>
			<tr>
				 <td> E-Mail </td> 
				 <td> : </td> 
				 <td><input type="text"  name="email" placeholder="Contoh : email@gmail.com"> </td>
			</tr>
			<tr>
				 <td> Pass </td> 
				 <td> : </td> 
				 <td><input type="password" class="password" name="password" placeholder="Password" id="test1"><input id="test2" type="checkbox" />Show </td>
			</tr>
			<tr>
				 <td> Dari </td> 
				 <td> : </td> 
				 <td> <input type="text" name="username" placeholder="Nama Pemberi Memo"> </td>
			</tr>
			<tr>
				<td> Kepada </td> 
				<td> : </td> 
				<td> 
				<select name="title">
					<option value="Bpk.">Bpk.</option>
					<option value="Ibu.">Ibu.</option>
					<option value="Sdr.">Sdr.</option>
					<option value="Sdri.">Sdri.</option>
				</select>
				<input type="text" name="tujuan" placeholder="Nama Penerima Memo">  </td>
			</tr>
			<tr>
				<td> Email Penerima </td> 
				<td> : </td> 
				<td> <input type="text" name="kepada" placeholder="Contoh : email@gmail.com"> </td>
			</tr>
			<tr>
				<td> Email Tembusan </td> 
				<td> : </td> 
				<td> <input type="text" name="tembusan" placeholder="Contoh : email@gmail.com"> </td>
			</tr>
			<tr>
				<td> Perihal </td> <td> : </td> <td> <input type="text" size="60" name="subject" placeholder="Memo Penting"> </td>
			</tr>
			<tr>
				<td colspan="5"> <br> </td>
			</tr>
			<tr>
				<td colspan="3" align="center"> <textarea name="isi" style='width: 465px; height: 400px; resize: none;'> </textarea></td>
			</tr>
			<tr>
				<td colspan="5"> <br> </td>
			</tr>
		</table>
	</form>
<script type="text/javascript">
		(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));

//Here how to call above plugin from everywhere in your application document body
$.toggleShowPassword({
    field: '#test1',
    control: '#test2'
});
	</script>
</body>
</html>