<?
namespace App\Http\Controllers\Seller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereHas('items.shop',function($q){
            $q->where('user_id',auth()->id());
        })
        ->addSelect([
            'item_count'=>OrderItem::selectRaw('count(*) as item_count')
            ->whereColumn('order_id','orders.id')
            ->whereHas('product.shop',function($q){
                $q->where('user_id',auth()->id());
            }),
        ])
        ->get();
        $orders->map(function($order){
            $orderStatus='processing';
            $undeliveredItems = $order->items()
            ->whereHas('shop',function($q){
                $q->where('user_id',auth()->id());
            })
            ->whereNull('delivered_at')
            ->count();
            if($undeliveredItems==0){
                $orderStatus = 'completed';
            }
            $order['seller_order_status']=$orderStatus;
            return $order;
        });
        return view('sellers.orders.index',compact('orders'));
    }
    public function show(Order $order)
    {
        $items = $order->item()->whereHas('shop',function($q){
            $q->where('user_id',auth()->id());
        })->get();
        return view('sellers.orders.show',compact('items'));
    }
    public function markDelivered(Order $order)
    {
        $items = $order->item()->whereHas('shop',function($q){
            $q->where('user_id',auth()->id());
        })->update(['delivered_at'=>now()]);
        return redirect('/vendor/orders')->withMessage('order marked complete');
    }
}
