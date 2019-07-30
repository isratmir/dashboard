<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources;

class ResourcesController extends Controller
{
    public function index() {

      $resources = Resources::all();

      return view('resources.index', ['resources'=>$resources]);
    }

    public function create() {
      return view('resources.add');
    }

    public function store(Request $r) {
      $resource = new Resources();
      $resource->title = $r->get('title');
      $resource->url = $r->get('url');
      $resource->timeout = $r->get('timeout');
      $resource->picture = $r->get('picture');
      $resource->skip_peer_verification = $r->get('skip_peer_verification') === "on" ? 1 : 0;
      $resource->skip_hostname_verification = $r->get('skip_hostname_verification') === "on" ? 1 : 0;
      $resource->save();

      return redirect('resources')->with('status', 'Ресурс добавлен!');
    }

    public function edit($id) {
      $res = Resources::find($id);
      if($res) {
        return view('resources.edit', ['resource'=>$res]);
      }
    }

    public function update(Request $r, $id) {
      $resource = Resources::find($id);
      $resource->title = $r->get('title');
      $resource->url = $r->get('url');
      $resource->timeout = $r->get('timeout');
      $resource->picture = $r->get('picture');
      $resource->skip_peer_verification = $r->get('skip_peer_verification') === "on" ? 1 : 0;
      $resource->skip_hostname_verification = $r->get('skip_hostname_verification') === "on" ? 1 : 0;
      $resource->save();

      return redirect('resources')->with('status', 'Ресурс изменен!');
    }

    public function destroy($id) {
      $resource = Resources::find($id);
      if($resource){
        $resource->delete();
      }

      return redirect('resources')->with('status', 'Ресурс удален!');
    }
}
