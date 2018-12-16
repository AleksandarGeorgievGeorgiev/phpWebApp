<?php

namespace App\Http\Controllers;
use PDF;
use App\Post;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF($id){
        $post = Post::find($id);
        $pdf = PDF::loadView('pdf', compact('post', $post));
        return $pdf->download('Post_info.pdf');
    }
}
