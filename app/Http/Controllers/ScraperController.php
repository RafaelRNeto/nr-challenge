<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;



class ScraperController extends Controller 
{

   private $client;

   public function __construct(Client $client) 
   {
      $this->client = $client;
   }

   public function sebrae() //   Getting sebrae informations
   {
      $title = "Sebrae";

      $client  = $this->client;
      $sebrae = $client->request("GET", "http://www.portal.scf.sebrae.com.br/licitante/frmPesquisarAvancadoLicitacao.aspx");

      $unit = $sebrae->filter('#resultadoBusca > .unidade > span')->each(function (Crawler $node) {
         return $node->text();
      });

      $concurrence = $sebrae->filter('#resultadoBusca > .unidade > h3')->each(function (Crawler $node) {
         return $node->text();
      });    
      
      $data = $sebrae->filter('#resultadoBusca p')->each(function (Crawler $node) {
         //$array = array('Data de Abertura:', 'Situacão:');      
         return $node->text();
      });

      return view('data', compact('title', 'concurrence', 'unit','data'));
   }

   public function cnpq() //  Getting cnpq informations
   {
      $title = "Cnpq";

      $client = $this->client;
      $cnpq = $client->request("GET", "http://www.cnpq.br/web/guest/licitacoes");
      
      $category = $cnpq->filter(".licitacoes h4")->each(function (Crawler $node){
         return $node->text();
      });

      $object = $cnpq->filter(".cont_licitacoes")->each(function (Crawler $node){
         return $node->text();
      });
      $opening = $cnpq->filter(".data_licitacao")->each(function (Crawler $node){
         return $node->text();
      });

      return view('data', compact('title', 'category', 'object', 'opening'));
   }
}
