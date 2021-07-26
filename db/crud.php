<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertBlogs($btitle, $tag, $dob, $bcontent, $bpreview,$fblink,$instalink,$reglink,$destination){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO ojblog (blogtitle,blog_tag_id,dateofblog,blogcontent,blogpreview,facebooklink,instalink,registrationlink,imagepath) VALUES (:btitle, :tag, :dob, :bcontent, :bpreview,:fblink,:instalink,:reglink,:destination)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':btitle',$btitle);
                $stmt->bindparam(':tag',$tag);
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

        public function insertFeedbacks($experience,$fren,$ts,$appr,$feedText){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `event_feedback`(`overall_experience`, `staff_behaviour`, `date`, `relevance`, `suggestion`) VALUES (:experience,:fren,:ts,:appr,:feedText)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':experience',$experience);
                $stmt->bindparam(':fren',$fren);
                $stmt->bindparam(':ts',$ts);
                $stmt->bindparam(':appr',$appr);
                $stmt->bindparam(':feedText',$feedText);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertComments($cname, $cmail, $ccontent, $cbid, $doc){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `blogcoments`(`comment_name`, `comment_mail`, `comment_content`, `blog_id`, `comment_date`) VALUES (:cname,:cmail,:ccontent,:cbid,:doc)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':cname',$cname);
                $stmt->bindparam(':cmail',$cmail);
                $stmt->bindparam(':ccontent',$ccontent);
                $stmt->bindparam(':cbid',$cbid);
                $stmt->bindparam(':doc',$doc);
                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editBlog($id,$btitle, $tag, $bcontent, $bpreview,$fblink,$instalink,$reglink){
            try{ 
                 $sql = "UPDATE `ojblog` SET `blogtitle`=:btitle,`blog_tag_id`=:tag,`blogcontent`=:bcontent,`blogpreview`=:bpreview,`facebooklink`=:fblink,`instalink`=:instalink,`registrationlink`=:reglink WHERE blog_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':btitle',$btitle);
                 $stmt->bindparam(':tag',$tag);
                 $stmt->bindparam(':bcontent',$bcontent);
                 $stmt->bindparam(':bpreview',$bpreview);
                 $stmt->bindparam(':fblink',$fblink);
                 $stmt->bindparam(':instalink',$instalink);
                 $stmt->bindparam(':reglink',$reglink);
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
                $sql = "select *from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id order by dateofblog DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getComments($id){
            try{
                $sql = "SELECT * FROM `blogcoments` WHERE blog_id = $id ";
                $res = $this->db->query($sql);
                return $res;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getCarousel(){
            try{
                $sql = "select *from ojblog order by dateofblog DESC LIMIT 3";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getBlogDetails($id){
            try{
                 $sql = "select * from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id where blog_id = :id";
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

         public function getTags(){
            try{
                $sql = "SELECT * FROM `blogtypes`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

         public function searchBlogs($search){
            try{
                $sql = "SELECT * FROM `ojblog` a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id WHERE `blogcontent` LIKE '%{$search}%'";
                $stmt = $this->db->prepare($sql);
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getTagById($id){
            try{
                $sql = "SELECT * FROM `blogtypes` where blog_tag_id = :id";
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
 
    }
    
?>