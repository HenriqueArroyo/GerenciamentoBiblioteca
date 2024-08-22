<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Livros;
use App\Models\Usuario;

class EmprestimoController extends Controller
{
    // Exibir o formulário para adicionar um novo empréstimo
    public function create()
    {
        $livros = Livros::where('disponivel', true)->get();
        $usuarios = Usuario::all();
        return view('emprestimos.create', compact('livros', 'usuarios'));
    }

    // Processar o envio do formulário para adicionar um novo empréstimo
    public function store(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'dataEmprestimo' => 'required|date',
            'dataDevolucao' => 'nullable|date|after_or_equal:dataEmprestimo',
        ]);

        // Verificar se o livro está disponível
        $livro = Livros::findOrFail($request->livro_id);
        if (!$livro->disponivel) {
            return back()->withErrors(['livro_id' => 'O livro selecionado não está disponível.']);
        }

        // Criar o empréstimo
        Emprestimo::create([
            'livro_id' => $request->livro_id,
            'usuario_id' => $request->usuario_id,
            'devolvido' => false,
        ]);

        // Marcar o livro como não disponível
        $livro->update(['disponivel' => false]);

        return redirect()->route('livros.logado')->with('success', 'Empréstimo criado com sucesso!');
    }

    // Exibir a lista de empréstimos
    public function index()
    {
        $emprestimos = Emprestimo::with('livro', 'usuario')->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    // Atualizar o status de devolução do livro
    public function devolucao($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->update([
            'devolvido' => true,
            'dataDevolucao' => now(),
        ]);

        // Marcar o livro como disponível
        $livro = $emprestimo->livro;
        $livro->update(['disponivel' => true]);

        return redirect()->route('emprestimos.index')->with('success', 'Livro devolvido com sucesso!');
    }
}
