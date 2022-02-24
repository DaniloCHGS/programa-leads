<?
require __DIR__ . "/vendor/autoload.php";
use App\Model\Leads;

$leads = new Leads();
// $filterLeads = $leads->select('mes_solicitado');
$body = $_POST['data'];
echo $body;
?>