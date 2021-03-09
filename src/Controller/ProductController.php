<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validation;
use App\Entity\Appointments;
use Knp\Component\Paper\PaginatorInterface;

use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */

    public function resjson($product){
        //serializar datos
 
        $json =$this->get('serializer')->serialize($product, 'json');

        // asignar httpfoundation
        $response = new Response();
        //asignar contenido respuesta
        $response->setContent($json);
        //indicar formato
        $response->headers->set('Content-Type', 'application/json');
        //devolcver respuesta
        return $response;

    }


    public function index()
    {


        $product_repo = $this->getDoctrine()->getRepository(Product::class);
        $products = $product_repo->findAll();
        $product = $product_repo->find(1);

        $data = [
            'message' => 'welcome to your new controller',
            'path' => 'src/Controller/ProductController.php',
        ];
 
        return $this->resjson($products);
   
    }

    public function create(Request $request){
        //recoger datos posix_times
        
        $json = $request->get('json', null);
        //decodificar
        $params = json_decode($json);
          
        
        //comprobar
        if($json != null){
           // $id = (!empty($params->id)) ? $params->id : null;
            $name = (!empty($params->name)) ? $params->name : null;
            $description = (!empty($params->description)) ? $params->description : null;
            $price = (!empty($params->price)) ? $params->price : null;
            
          if(!empty($name) && !empty($description) && !empty($price)  ){
            $product = new Product();
            $product->setname($name);
            $product->setDescription($description);
            $product->setPrice($price);
            $product->setCreatedAT(new \Datetime('now'));
            $product->setUpdateAT(new \Datetime('now'));

            $doctrine = $this->getDoctrine();
            $em = $doctrine->getManager();

            $em->persist($product);
                $em->flush();
           /* $errors = $validator->validate($product);
            if (count($errors) > 0) {
                    return new Response((string) $errors, 400);
                }*/
    
            return new Response('Created product id ' . $product->getId());
          //  return $this->json($product);
          }
        }
           
    }

   /* public function list(Request $request)
    {
        var_dump($request->get('name'));
        die;
    }*/
    public function show(Request $request): Response
    {

       /* $product_repo = $this->getDoctrine()->getRepository(Product::class);
        $products = $product_repo->findAll();
        $product = $product_repo->find(1);*/

        $product_repo = $this->getDoctrine()->getRepository(Product::class);
        $products = $product_repo->findAll();
        $product = $product_repo->find(5);

         /*   ->getRepository(Product::class)
            ->find($id);*/

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$product
            );
        }
        

        return new Response('Check out this great product: '.$product->getId().$product->getName().$product->getDescription().$product->getPrice());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
    public function update(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find(7);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('cambiamos nuevo nombret name!');
        $entityManager->flush();

        return $this->redirectToRoute('show', [
            'id' => $product->getId()
        ]);
    }
    public function delete(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find(9);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $entityManager->remove($product);
        $entityManager->flush();
        /*$product->setName('cambiamos nuevo nombret name!');
        $entityManager->flush();*/

        return $this->redirectToRoute('show', [
            'id' => $product->getId()
        ]);
    }


  
}



