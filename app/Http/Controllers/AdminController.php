<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function updateOrderStatus(Request $request, $order)
    {
        // Valider les données du formulaire
        $request->validate([
            'status' => 'required|in:pending,processed', // Ajoutez ici tous les statuts possibles
        ]);

        // Récupérer l'ordre à mettre à jour
        $order = Order::findOrFail($order);

        // Mettre à jour le statut de la commande avec le statut envoyé depuis le formulaire
        $order->status = $request->input('status');
        $order->save();

        // Rediriger avec un message de succès ou retourner la vue appropriée
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
