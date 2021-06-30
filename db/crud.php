<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertBlogs($btitle, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO ojblog (blogtitle,dateofblog,blogcontent,blogpreview,facebooklink,instalink,registrationlink,imagepath) VALUES (:btitle, :dob, :bcontent, :bpreview,:fblink,:instalink,:reglink,:destination)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':btitle',$btitle);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':bcontent',$bcontent);
                $stmt->bindparam(':bpreview',$bpreview);
                $stmt->bindparam(':fblink',$fblink);
                $stmt->bindparam(':instalink',$instalink);
                $stmt->bindparam(':reglink',$reglink);
                $stmt->bindparam(':destination',$destination);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        
        public function editBlog($id,$btitle, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination){
            try{ 
                 $sql = "UPDATE `ojblog` SET `blog_id`=:btitle,`blogtitle`=:btitle,`dateofblog`=:dob,`blogcontent`=:bcontent,`blogpreview`=:bpreview,`facebooklink`=:fblink,`instalink`=:instalink,`registrationlink`=:reglink,`imagepath`=:destination WHERE blog_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':btitle',$btitle);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':bcontent',$bcontent);
                $stmt->bindparam(':bpreview',$bpreview);
                $stmt->bindparam(':fblink',$fblink);
                $stmt->bindparam(':instalink',$instalink);
                $stmt->bindparam(':reglink',$reglink);
                $stmt->bindparam(':destination',$destination);

 
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

        public function getBlogs(){
            try{
                $sql = "SELECT * FROM `ojblog`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getBlogDetails($id){
            try{
                 $sql = "select * from ojblog where blog_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 $result = $stmt->fetch();
                 return $result;
            }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }
         
         public function deleteBlog($id){
            try{
                 $sql = "delete from ojblog where blog_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }
 
    }
    
?>