<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Adverts;
class Core extends Controller
{

    public function getAdverts($id)
    {
        $user = User::find($id);

        $adverts = \DB::table('users')->where('user_id', '=', $id)
            ->join('adverts', 'users.id', '=', 'adverts.user_id')
            ->select('users.name', 'users.id','users.email','users.number','adverts.*')
            ->orderBy('updated_at','DESC')
            ->limit(10)
            ->get();

        $count = $adverts->count();
        $data = [
            'adverts' => $adverts,
            'users' => User::all(),
            'user_id' => $id,
            'count' => $count,
        ];
        return view('welcome', $data);
//        dd($count);
    }
    public function getAllAdverts()
    {
        $adverts = \DB::table('users')
            ->join('adverts', 'users.id', '=', 'adverts.user_id')
            ->select('users.name', 'users.id','users.email','users.number','adverts.*')
            ->orderBy('updated_at','DESC')
            ->limit(10)
            ->get();
        $count = $adverts->count();
        $data = [
            'adverts' => $adverts,
            'users' => User::all(),
            'user_id' => 0,
            'count' => $count,
        ];
        return view('welcome', $data);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048'
        ]);
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image'),$new_name);
        $form_data = array(
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $new_name,
            'user_id'     => $id
        );
        $user = User::find($id);
        $new_advert = new Adverts($form_data);
        $user->user_additional_advert()->save($new_advert);

        return redirect('adverts/'.$id)->with('success', 'Обьявление успешно добавлено.');
    }
    public function destroy($id)
    {
        $advert = Adverts::findOrFail($id);
        $advert->delete();
        return redirect('/')->with('deleted','Объявление успешно удалено.');
    }
    public function edit($id)
    {
        $data = Adverts::findOrFail($id);
        return view('edit', $data);
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image !=''){
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|max:2048'
            ]);
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image'),$image_name);
        }else{
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
        }
        $form_data = array(
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $image_name,
        );
        Adverts::whereId($id)->update($form_data);
        return redirect('/')->with('deleted','Объявление успешно Изменено.');
    }
}
