<?php namespace App\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Response;
   Use Symfony\Component\Routing\Annotation\Route;
   use App\Entity\Formation;
 
    use Symfony\Component\HttpFoundation\Request;
      use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
        
       use Symfony\Component\Form\Extension\Core\Type\TextType; 
       use Symfony\Component\Form\Extension\Core\Type\SubmitType;
       use App\Form\FormationType;
       use App\Entity\Employe;
       use App\Form\EmployeType;
       use App\Entity\PropertySearch;
       use App\Form\PropertySearchType;
      use App\Repository\FormationRepository;
      use App\Entity\EmployeSearch;
       use App\Form\EmployeSearchType;
       use App\Repository\EmployeRepository;
       use App\Entity\SalaireSearch;
       use App\Form\SalaireSearchType;
   
   
   class IndexController extends AbstractController {
        
  /**
   * @Route("/", name="lister")
   * Method({"GET", "POST"}) 
   */
    public function home(FormationRepository $formationRepository): Response
    {
        return $this->render('formations/index1.html.twig', [
            'formations' => $formationRepository->findAll(),
        ]);
    }
    /**
   * @Route("/listemploye", name="listeemploye")
   * Method({"GET", "POST"}) 
   */
  public function listeemploye(EmployeRepository $employeRepository): Response
  {
      return $this->render('formations/index2.html.twig', [
          'employes' => $employeRepository->findAll(),
      ]);
  }



/** * @Route("/formation/save") */
 public function save() {
      $entityManager = $this->getDoctrine()->getManager();
       $formation = new Formation();
        $formation->setNomFormation('aaaa');
         $formation->setCentre('bbb');
         $formation->setFormateur('slim');
         $formation->setDateDebut('2019-06-05');
         $formation->setDateFin('2019-07-05');
         $formation->setLieu('nabeul');
          $entityManager->persist($formation);
           $entityManager->flush();
            return new Response('formation enregisté avec id '.$formation->getId());
        
        }

/**
  * @Route("/formation/new", name="new_formation")
   * Method({"GET", "POST"}) 
   */ public function new(Request $request) { $formation = new Formation(); $form = $this->createForm(FormationType::class,$formation); $form->handleRequest($request); if($form->isSubmitted() && $form->isValid()) { $formation = $form->getData(); $entityManager = $this->getDoctrine()->getManager(); $entityManager->persist($formation); $entityManager->flush(); return $this->redirectToRoute('lister'); } return $this->render('formations/new.html.twig',['form' => $form->createView()]); }

           /**
             * @Route("/formation/edit/{id}", name="edit_formation")
             * Method({"GET", "POST"}) 
             */ public function edit(Request $request, $id) { $formation = new Formation(); $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id); $form = $this->createForm(FormationType::class,$formation); $form->handleRequest($request); if($form->isSubmitted() && $form->isValid()) { $entityManager = $this->getDoctrine()->getManager(); $entityManager->flush(); return $this->redirectToRoute('lister'); } return $this->render('formations/edit.html.twig', ['form' => $form->createView()]); }


            /**
               * @Route("/formation/delete/{id}",name="delete_formation")
               * @Method({"DELETE"})
               */
              public function delete(Request $request, $id) {
                   $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
                    $entityManager = $this->getDoctrine()->getManager();
                     $entityManager->remove($formation);
                      $entityManager->flush();
                       $response = new Response();
                        $response->send();
                         return $this->redirectToRoute('lister'); }

                        /**
                         *@Route("/formation/recherche",name="recherche")
                         */
                         public function recherche(Request $request) {
                              $propertySearch = new PropertySearch();
                               $form = $this->createForm(PropertySearchType::class,$propertySearch);
                                $form->handleRequest($request);
                                $formations= [];
                                 if($form->isSubmitted() && $form->isValid()) {
                                  $NomFormation = $propertySearch->getNomFormation();
                                   if ($NomFormation!="")
                                     $formations= $this->getDoctrine()->getRepository(Formation::class)->findBy(['NomFormation' => $NomFormation] );
                                      else
                                       $formations= $this->getDoctrine()->getRepository(Formation::class)->findAll(); } return $this->render('formations/index.html.twig',[ 'form' =>$form->createView(), 'formations' => $formations]); }



        /**
          * @Route("/employe/newEmp", name="new_employe")
          * Method({"GET", "POST"})
           */ public function newEmploye(Request $request) {
                $employe = new Employe(); 
                $form = $this->createForm(EmployeType::class,$employe);
                $form->handleRequest($request);
                 if($form->isSubmitted() && $form->isValid()) {
                      $formation = $form->getData();
                       $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($employe);
                         $entityManager->flush(); }
                          return $this->render('formations/newEmploye.html.twig',['form'=> $form->createView()]); }




        /**
          * @Route("/for_emp/", name="formation_par_emp")
          * Method({"GET", "POST"})
          */ 
          public function formationsParEmploye(Request $request) {
             $employeSearch = new EmployeSearch();
              $form = $this->createForm(EmployeSearchType::class,$employeSearch);
               $form->handleRequest($request); $formations= [];
               if($form->isSubmitted() && $form->isValid()) { $employe = $employeSearch->getEmploye();
                 if ($employe!="") $formations= $employe->getFormations();
                  else $formations= $this->getDoctrine()->getRepository(Formation::class)->findAll();
                 } return $this->render('formations/formationsParEmploye.html.twig',['form' => $form->createView(),'formations' => $formations]); }





           /**
             * @Route("/employe/edit/{id}", name="edit_employe")
             * Method({"GET", "POST"}) 
             */ public function edit1(Request $request, $id) { $employe = new Employe(); $employe = $this->getDoctrine()->getRepository(Employe::class)->find($id); $form = $this->createForm(EmployeType::class,$employe); $form->handleRequest($request); if($form->isSubmitted() && $form->isValid()) { $entityManager = $this->getDoctrine()->getManager(); $entityManager->flush(); return $this->redirectToRoute('listeemploye'); } return $this->render('formations/edit1.html.twig', ['form' => $form->createView()]); }



           /**
             * @Route("/formation/show/{id}", name="formation_show")
             * Method({"GET", "POST"}) 
             */
             public function show(Formation $formation): Response
             {
                 return $this->render('formations/show.html.twig', [
                     'formation' => $formation,
                 ]);
             }

           /**
             * @Route("/employe/show/{id}", name="employe_show")
             * Method({"GET", "POST"}) 
             */
            public function show1(Employe $employe): Response
            {
                return $this->render('formations/show1.html.twig', [
                    'employe' => $employe,
                ]);
            }


               /**
               * @Route("/employe/delete/{id}",name="delete_employe")
               * @Method({"DELETE"})
               */
              public function delete1(Request $request, $id) {
                $employe = $this->getDoctrine()->getRepository(Employe::class)->find($id);
                 $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->remove($employe);
                   $entityManager->flush();
                    $response = new Response();
                     $response->send();
                      return $this->redirectToRoute('listeemploye'); }





            /**
              * @Route("/emp_salaire/", name="employe_par_salaire")
              * Method({"GET"})
               */
               public function employesParSalaire(Request $request) {
                  $salaireSearch = new SalaireSearch();
                   $form = $this->createForm(SalaireSearchType::class,$salaireSearch);
                    $form->handleRequest($request);
                     $employes= [];
                      if($form->isSubmitted() && $form->isValid()) {
                         $minSalaire = $salaireSearch->getMinSalaire();
                          $maxSalaire = $salaireSearch->getMaxSalaire();
                           $employes= $this->getDoctrine()-> getRepository(Employe::class)->findBySalaireRange($minSalaire,$maxSalaire);
                           }
                            return $this->render('formations/employesParSalaire.html.twig',[ 'form' =>$form->createView(), 'employes' => $employes]); }

}