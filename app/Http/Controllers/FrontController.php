<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Seccion;
use App\Faq;
use App\Politica;
use App\SliderPrincipal;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Talla;
use App\Tematica;
use App\Blog;
use App\Elemento;
use App\Ventana;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class FrontController extends Controller
{
    public function index() {
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 4)->get();
        $slider_principal = SliderPrincipal::all();
        $catalogos = Catalogo::where('activo', 1)->get();
        $blogs = Blog::all();

        return view('front.index', compact('config', 'elements', 'slider_principal', 'catalogos', 'blogs'));
    }

    public function admin() {
        return view('front.admin');
    }

    public function nosotros() {
        $config = Configuracion::first();
        $elements = Elemento::all();


        return view('front.nosotros', compact('config', 'elements'));
    }

    public function contacto() {
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 6)->get();

        return view('front.contacto', compact('config', 'elements'));
    }

    public function catalogo_productos() {
        $categorias = Categoria::where('activo', 1)->get()->toBase();
        $productos = Catalogo::where('activo', 1)->where('visible', 1)->get()->toBase();
        
        return view('front.catalogo_productos', compact('productos', 'categorias'));
    }

    public function catalogo_detalle(Catalogo $producto) {
        return view('front.catalogo_detalle', compact('producto'));
    }

    public function blog() {
        $tematicas = Tematica::where('activo', 1)->where('oculto', 0)->get()->toBase();
        $blogs = Blog::where('activo', 1)->where('oculto', 0)->get()->toBase();

        return view('front.blog', compact('blogs', 'tematicas'));
    }

    public function blog_detalle(Blog $blog) {
        return view('front.blog_detalle', compact('blog'));
    }

    

    public function portafolio(){
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 13)->get();
        $ventana = Ventana::where('visible', 1)->get();
        $vcount = 0;
        foreach($ventana as $v){
            $v->cuenta=$vcount;
            $vcount ++;
        };

        return view('front.portafolio', compact('config', 'elements', 'ventana'));
    }

    

    public function paginaweb($id){
        $categoria = Catalogo::find($id);
        
        
        return view('front.paginaweb', compact('categoria'));
    }

    public function webadmin(){
        return view('front.webadmin');
    }

    public function tiendaenlinea(){
        return view('front.tiendaenlinea');
    }

    public function marketing(){
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 11)->get();

        return view('front.marketing', compact('config', 'elements'));
    }

    public function sobrewozial(){
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 10)->get();

        return view('front.sobrewozial', compact('config', 'elements'));
    }

    public function eventos(){
        return view('front.eventos');
    }

    public function aviso_privacidad() {
        $aviso_privacidad = Politica::find(1);
        return view('front.aviso_privacidad', compact('aviso_privacidad'));
    }

    public function metodos_pago() {
        $metodos_pago = Politica::find(2);
        return view('front.metodos_pago', compact('metodos_pago'));
    }

    public function devoluciones() {
        $devoluciones = Politica::find(3);
        return view('front.devoluciones', compact('devoluciones'));
    }

    public function terminos_condiciones() {
        $terminos_condiciones = Politica::find(4);
        return view('front.terminos_condiciones', compact('terminos_condiciones'));
    }

    public function garantias() {
        $garantias = Politica::find(5);
        return view('front.garantias', compact('garantias'));
    }

    public function politicas_envio() {
        $politicas_envio = Politica::find(6);
        return view('front.politicas_envio', compact('politicas_envio'));
    }

    public function faqs() {
        $preguntas = Faq::all();
        return view('front.faqs', compact('preguntas'));
    }

    public function formularioContact(Request $request) {
        $mail = new PHPMailer;
		$validate = Validator::make($request->all(),[
			'nombre' => 'required',
			"empresa" => "required",
			'email' => 'required',
            'whatsapp' => 'required',
			"mensaje" => "required",
		],[],[]);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren todos los datos');
			return redirect()->back();
		}

		$data = array(
			'tipoForm' => $request->tipoForm,
			'nombre' => $request->nombre,
			'empresa' => $request->empresa,
			'email' => $request->email,
            'whatsapp' => $request->whatsapp,
			'mensaje' => $request->mensaje,
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		$html = view('front.mailcontact', compact('data'));

		$config = Configuracion::first();

		try {
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			// $mail->SMTPDebug = 2;
			$mail->Host = $config->remitentehost;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = $config->remitenteport;

			$mail->SetFrom($config->remitente, 'Ragnar - Contacto');
			$mail->isHTML(true);

			$mail->addAddress($config->destinatario,'Ragnar - Contacto');
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,'Ragnar - Contacto');
			}

			$mail->Subject = 'Mensaje';

			$mail->msgHTML($html);
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
                \Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
			}else{
				\Toastr::error('Error al enviar el correo');
				return redirect()->back();
			}
		} catch (phpmailerException $e) {
			\Toastr::error($e->errorMessage());//Pretty error messages from PHPMailer
			return redirect()->back();
		} catch (Exception $e) {
			\Toastr::error($e->getMessage());//Boring error messages from anything else!
			return redirect()->back();
		}
    }

    public function mailtest() {

        // $tipo_form = "home";
        $tipo_form = "contacto";

        if($tipo_form == "home") {
            $data = array(
                'tipoForm' => $tipo_form,
                'nombre' => 'Michael Eduardo Sandoval Pérez',
                'email' => 'mikeed1998@gmail.com',
                'mensaje' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'hoy' => Carbon::now()->format('d-m-Y')
            );
        } else if($tipo_form == "contacto") {
            $data = array(
                'tipoForm' => $tipo_form,
                'nombre' => 'Michael Eduardo Sandoval Pérez',
                'telefono' => '3322932239',
                'email' => 'mikeed1998@gmail.com',
                'mensaje' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'hoy' => Carbon::now()->format('d-m-Y')
            );
        } else {

        }

        return view('front.mailtest', compact('data'));
    }

}



