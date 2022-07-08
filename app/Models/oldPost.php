
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Post /* extends Model */
{
    
    public $title;
    public $excerpt;
    public $date;
    public $redirect;
    public $body;
    
    

    public function __construct($title, $excerpt, $date, $redirect, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->redirect = $redirect;
        $this->body = $body;
    }
    public static function All(){
    // On récupère en 1er les fichiers qui se trouvent dans resources/posts/
    // Ensuite on parcours la liste des fichiers que l'on a récupérer.
    // Puis, pour chaque fichier que l'on a récupérer, on créer un nouveau Post
    // Qui contiendra plusieurs informations selon le model 'Post'

        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("post/")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file)
                )
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->redirect,
                    $document->body()
                )
                )->sortBy('date');
        });

    }

    public static function find($slug){
        /* $posts = static::All(); */ // On récupère tout

        return static::All()->firstWhere('redirect', $slug); // On selectionne le poste dont la balise correspond au slug.


    }

    public static function findOrFail($slug){
        
        $post = static::find($slug);

        if(! $post){
            throw new NotFoundHttpException;
        }
        return $post;

    }

    


}


### Unused content from function find(){};
/* base_path();
        if(file_exists($path = resource_path("post/{$slug}.html"))){

        return cache()->remember("monPost.{$slug}", 30, fn() => file_get_contents($path));
        
        }else{

           throw new ModelNotFoundException();
    } */
