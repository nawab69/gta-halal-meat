@component('mail::message')
    <div class="es-wrapper-color" style="padding: 10%">
        <!--[if gte mso 9]>
        <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
            <v:fill type="tile" color="transparent" origin="0.5, 0" position="0.5,0"></v:fill>
        </v:background>
        <![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="esd-email-paddings" valign="top">
                    <table class="es-content esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                        <tr>
                            <td class="esd-stripe" align="center">
                                <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                    <tr>
                                        <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" esd-general-paddings-checked="false" style="background-color: #ffcc99; padding: 50px;" bgcolor="#ffcc99" align="left" >
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="esd-block-text es-p15t es-p15b" align="center">
                                                                    <div class="esd-text">
                                                                        <h2 style="color: #242424; font-size: 30px;"><strong>Your order has been cancelled. </strong></h2>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-block-text es-p10l" align="center">
                                                                    <p style="color: #242424;">Hello there, We have cancelled your order as you wanted. Thanks for Choosing GTA Halal Meat service and welcome again. If you have any suggestions about us, please let us know.</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-block-button es-p15t es-p15b es-p10r es-p10l" align="center"><span class="es-button-border" style="border-radius: 20px; background: #191919 none repeat scroll 0% 0%; border-style: solid; border-color: #2cb543; border-width: 0px;"><a href="{{route('site.pages.homepage')}}" class="es-button" target="_blank" style="border-radius: 20px; font-family: lucida sans unicode,lucida grande,sans-serif; font-weight: normal; font-size: 18px; border-width: 10px 35px; background: #191919 none repeat scroll 0% 0%; border-color: #191919; color: #ffffff;">Order Again</a></span></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endcomponent
