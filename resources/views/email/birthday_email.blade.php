<p> </p>
<table style="background-color: #891d99; font-family: Arial; font-size: 18px; padding: 50px; width: 800px;" align="center">
    <tbody>
    <tr>
        <td class="wysiwyg-text-align-center" style="padding: 20px;"><span class="wysiwyg-color-black10"></span><br /> <br />
            <table style="background-color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr></tr>
                <tr style="padding-top: 20px; text-align: center;">
                    <td style="padding: 30px;"><img src="http://res.cloudinary.com/dhkcpbx2w/image/upload/c_scale,w_300/v1498078911/Happy_Birthday_uwz5vs.png" />
                        <br/>
                        <br/>
                        <div style="text-align: left;"> </div>
                        <div style="text-align: left; "><b>Hello {{ $emailData['first_name'] . ' '  . $emailData['surname']}},</b></div>
                        <br/>
                        <p style="text-align: left;"> </p>
                        <div style="text-align: left;">Today the {{ date('l jS \of F', strtotime($emailData['birth_date'])) }} you turn {{ $emailData['age'] }}. Happy Birthday! </div>

                        <p style="text-align: left;">Best Regards,</p>
                        <p style="text-align: left;">HR Team</p>

                </tr>
                </tbody>
            </table>
            <table style="background-color: #bbbbbb;" border="0" width="100%" cellspacing="0" cellpadding="15" align="center">
                <tbody>
                <tr>
                    <td> </td>
                </tr>
                <tr>
                    <td>
                        <div style="color: #ffffff;"><em><span style="font-size: 9px;">&copy; Copyright Awardco.<br /></span> </em></div>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<p> </p>
