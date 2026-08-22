<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo lead desde Inmedia Brand</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f5f5f5; color: #1a1a1a; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width: 100%; background-color: #f5f5f5; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width: 100%; max-width: 640px; overflow: hidden; border-radius: 24px; background-color: #ffffff; box-shadow: 0 24px 70px rgba(0, 0, 0, 0.12);">
                    <tr>
                        <td style="background-color: #1f1f1f; padding: 32px 32px 28px;">
                            <img
                                src="{{ asset('assets/clients/logoweb-3.png') }}"
                                alt="In Media Brand"
                                width="190"
                                style="display: block; width: 190px; max-width: 75%; height: auto; margin: 0 0 28px;"
                            >
                            <p style="margin: 0 0 10px; color: #e5c100; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;">
                                Nuevo contacto
                            </p>
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; line-height: 1.2; font-weight: 700;">
                                Recibiste una solicitud desde el formulario web
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 32px;">
                            <p style="margin: 0 0 24px; color: #6b6b6b; font-size: 16px; line-height: 1.6;">
                                Una persona completó el formulario de contacto de In Media Brand. Estos son los datos enviados:
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width: 100%; border-collapse: separate; border-spacing: 0 12px;">
                                <tr>
                                    <td style="padding: 16px 18px; border: 1px solid #d9d9d9; border-radius: 16px; background-color: #f9f9f9;">
                                        <p style="margin: 0 0 6px; color: #b99700; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">Nombre completo</p>
                                        <p style="margin: 0; color: #1a1a1a; font-size: 16px; line-height: 1.5;">{{ $lead['nombre_completo'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 18px; border: 1px solid #d9d9d9; border-radius: 16px; background-color: #f9f9f9;">
                                        <p style="margin: 0 0 6px; color: #b99700; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">Empresa</p>
                                        <p style="margin: 0; color: #1a1a1a; font-size: 16px; line-height: 1.5;">{{ $lead['empresa'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 18px; border: 1px solid #d9d9d9; border-radius: 16px; background-color: #f9f9f9;">
                                        <p style="margin: 0 0 6px; color: #b99700; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">Correo corporativo</p>
                                        <p style="margin: 0; color: #1a1a1a; font-size: 16px; line-height: 1.5;">
                                            <a href="mailto:{{ $lead['correo_corporativo'] }}" style="color: #1f1f1f; text-decoration: none;">{{ $lead['correo_corporativo'] }}</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 18px; border: 1px solid #d9d9d9; border-radius: 16px; background-color: #f9f9f9;">
                                        <p style="margin: 0 0 6px; color: #b99700; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">Teléfono</p>
                                        <p style="margin: 0; color: #1a1a1a; font-size: 16px; line-height: 1.5;">
                                            <a href="tel:{{ preg_replace('/\s+/', '', $lead['telefono']) }}" style="color: #1f1f1f; text-decoration: none;">{{ $lead['telefono'] }}</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <div style="margin-top: 12px; padding: 22px; border-radius: 18px; background-color: #1f1f1f;">
                                <p style="margin: 0 0 10px; color: #e5c100; font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">Proyecto</p>
                                <p style="margin: 0; color: #ffffff; font-size: 16px; line-height: 1.7; white-space: pre-line;">{{ $lead['proyecto'] }}</p>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 22px 32px; background-color: #ececec; color: #6b6b6b; font-size: 12px; line-height: 1.6; text-align: center;">
                            Mensaje enviado desde el formulario de contacto de In Media Brand.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
