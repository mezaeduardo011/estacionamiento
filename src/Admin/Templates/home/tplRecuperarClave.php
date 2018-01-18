<div align="center">
    <table align="center" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-color:#ccc" width="700">
        <tbody>
        <tr>
            <td>
                <div style="width:700px">
                    <table width="100%" border="0" cellpadding="5" cellspacing="0" style="height:20px">
                        <tbody>
                        <tr>
                            <td align="center" colspan="0" height="78" bgcolor="#050505">
                                <img src="http://www.jphlions.com/images/logo1.png" width="169" height="82">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;text-align:center" width="700">
                    <tbody>
                    <tr>
                        <td ><br>
                            <p><b>Hola <?php echo $usuario;?></b><br><br>
                                Gracias por solicitar el cambio de clave. <br><br>
                                <em><b>A partir de ahora, se le gener&oacute; un enace tempora de uso exclusivo para recuperar contrase&ntilde;as.</b></em>
                                <br>
                                <br>
                                <a href="<?php echo JPH\Core\Store\Cache::get('urlWebs').'recuperarClaveToken?t='.$tokenRew?>" target="_blank">Hacer click en este link para recuperar la clave</a>
                                <br>
                                <br>Te recordamos que este link para recuperar contrase&ntilde;a tiene una validez de 10 minutos.
                                <br>
                                <br>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="width:700px">
                    <table style="width:100%;height:80px" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr style="height:100px">
                            <td style="vertical-align:middle;text-align:left;padding-left:22px" bgcolor="#050505">
                                <span style="font-size: 20px; color: #FFFFFF"><b>Sistema de Gesti&oacute;n Integral</b></span>
                            </td>
                            <td style="vertical-align:middle;text-align:right;padding-right:80px" bgcolor="#050505">
                                <a href="www.jphlions.com" target="_blank">
                                    <img src="http://www.jphlions.com/images/logofooter.png" width="122" height="50" border="none">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>



