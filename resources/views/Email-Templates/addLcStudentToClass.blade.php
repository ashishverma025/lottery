<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Tutify</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">
    </head>

    <body style="margin:0; padding:0; background-color:#F2F2F2;">
        <span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <td align="center" valign="top">

                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">

                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="left" valign="middle" style="font-size: 16px; font-family: Montserrat, sans-serif, 'Open Sans'; color: #555555">
                                            <p style="font-weight: 800; margin-bottom: 30px;">Dear {{@$data['name']}},</p>
                                            <p style="line-height: 24px">You have got a new admission from <strong>{{@$data['lc_name']}}</strong>.
                                                You can accept or reject this request. Please click the below button to accept & login as a Tutify students with for <strong>{{@$data['lc_name']}}</strong>
                                                button 1 : </p>
                                            <a href="{{url('email-verify')}}/{{@$data['studentId']}}/{{@$data['LcId']}}" style="display: inline-block; padding: 12px 30px; color: #fff; background: #011f3f; border-radius: 4px; text-decoration: none; margin: 5px 10px 5px 0">Accept</a>
                                            <a href="#" style="display: inline-block; padding: 12px 30px; color: #fff; background: #011f3f; border-radius: 4px; text-decoration: none; margin: 5px 10px 5px 0">Reject</a>
                                            <p style="margin-top: 30px; font-weight: 700">Your Login Credentials:</p>
                                            <p>Thank you for collaborating with us!</p>
                                            <p>If you did not create an account, no further action is required.</p>
                                            <p style="margin-top: 50px">Regards,</p>
                                            <p>Tutify</p>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>

