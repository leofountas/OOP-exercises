<?php

abstract class Elements 
{
    public function __construct(public string $title, public string $text)
    {
    }

    public function show(){

        $modified_title = $this->modifyTitle();

       return sprintf('<h1>%s</h1><br /><p>%s</p><br />', $modified_title, $this->text);;

    }

    abstract public function modifyTitle() : string;


}

class ADS extends Elements 
{
    public function modifyTitle(): string
    {
        return strtoupper($this->title);
    }
}

class Vacancies extends Elements 
{
    public function modifyTitle(): string
    {
        return $this->title . '- apply now!';
    }
}

class Article extends Elements
{
   private bool $breaking_news;

   public function __construct(public string $title, public string $text, $breaking_news)
   {
        parent::__construct($title, $text);
        $this->breaking_news = $breaking_news;
   }

   public function modifyTitle(): string
   {
    if($this->breaking_news == true){
        return 'BREAKING: ' . $this->title;
    }else {
        return $this->title;
    }
   }
}


$article1 = new Article('Why I hate the Pandas', 'It\'s a long story but in short cause they are stupid', true);
$article2 = new Article('Why I hate myself' , 'It\'s a long story but in short cause I\'m stupid', false);
$ads1 = new ADS('money without working!' , 'easy money? sell a kidney');
$vacancy1 = new Vacancies('I finished my ideas' , 'opsy');


$elements = [$article1, $article2, $ads1, $vacancy1];
?>

<!DOCTYPE html>
 <head>
 </head>
 <body>
    <?php foreach($elements as $element) { 
     echo $element->show();
    }?>
 </body>
</html>
