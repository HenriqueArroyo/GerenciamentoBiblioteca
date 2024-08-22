<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;

class LivrosController extends Controller
{
    // Exibir o formulário para adicionar um novo livro
    public function showAddForm()
    {
        return view('livros.create');
    }

        // Exibir a lista de livros
        public function index()
        {
            $livros = Livros::all(); // Obtém todos os livros
            return view('livros.index', compact('livros'));
        }

        public function loja()
        {
            $livros = Livros::all(); // Obtém todos os livros
            return view('livros.loja', compact('livros'));
        }

        public function logado()
        {
            $livros = Livros::all(); // Obtém todos os livros
            return view('livros.logado', compact('livros'));
        }
    // Processar o envio do formulário para adicionar um novo livro
    public function store(Request $request)
    {
        // Validações para o formulário de adição de livro
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anoPublicacao' => 'required|integer|min:1800|max:' . date('Y'),
            'disponivel' => 'required|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
        ]);

    $image_path = rand(0,99999) . '-' . $request->file('img')->getClientOriginalName();
    $path = $request->file('img')->storeAs('uploads', $image_path);
    // return $path;
        // Cria um novo livro
        Livros::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anoPublicacao' => $request->anoPublicacao,
            'disponivel' => $request->disponivel,
            'img' => $path,
        ]);

        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }

    // Atualizar o livro
    public function update(Request $request, $id)
    {
        $livro = Livros::findOrFail($id);

        // Validações para o formulário de edição de livro
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anoPublicacao' => 'required|integer|min:1800|max:' . date('Y'),
            'disponivel' => 'required|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
        ]);

        // Processa a imagem se fornecida
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('public/images');
            $livro->img = $imagePath;
        }

        // Atualiza o livro
        $livro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anoPublicacao' => $request->anoPublicacao,
            'disponivel' => $request->disponivel,
        ]);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    // Remover um livro
    public function destroy($id)
    {
        $livro = Livros::findOrFail($id);

        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso!');
    }
    // Exibir o formulário para editar um livro
public function edit($id)
{
    $livro = Livros::findOrFail($id);
    return view('livros.edit', compact('livro'));
}

}
