namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        // Ambil data pertama (asumsi hanya ada 1 data pengaturan toko)
        $toko = Toko::first() ?? new Toko(); 
        return view('admin.kontak.index', compact('toko'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'no_hp' => 'required',
            'email' => 'required|email',
        ]);

        $toko = Toko::first() ?: new Toko();
        $toko->fill($request->all());
        $toko->save();

        return redirect()->back()->with('success', 'Data kontak berhasil diperbarui!');
    }
}