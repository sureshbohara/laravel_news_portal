<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Sitemap;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use Session;
class SitemapController extends Controller
{
    
    public function index(Request $request)
    {
        $data['sitemaps'] = Sitemap::orderBy('id', 'Desc')->get();
        return view('admin.sitemap.index', $data);
    }


    public function download(Request $request) {
      return response()->download('sitemaps/'.$request->filename);
    }

    public function store(Request $request)
    {
        $data = new Sitemap();
        $input = $request->all();
        $filename = 'sitemap' . uniqid() . '.xml';
        SitemapGenerator::create($request->sitemap_url)->writeToFile('sitemaps/' . $filename);
        $input['filename']    = $filename;
        $input['sitemap_url'] = $request->sitemap_url;
        $data->fill($input)->save();
       toastr()->success('Sitemap Generate Successfully !!');
        return redirect()->route('sitemap.index');

    }

    public function destroy($id){
        $sitemap = Sitemap::find($id);
        @unlink('assets/sitemaps/' . $sitemap->filename);
        $sitemap->delete();
        toastr()->success('Sitemap file deleted successfully!');
        return redirect()->back();
    }

}
