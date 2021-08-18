<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertBlogs($btitle,$bauthor, $tag, $dob, $bcontent, $bpreview,$fblink,$instalink,$ytlink,$lilink,$reglink,$destination){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO ojblog (blogtitle,blogauthor,blog_tag_id,dateofblog,blogcontent,blogpreview,facebooklink,instalink,ytlink,lilink,registrationlink,imagepath) VALUES (:btitle,:bauthor, :tag, :dob, :bcontent, :bpreview,:fblink,:instalink,:ytlink,:lilink,:reglink,:destination)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':btitle',$btitle);
                $stmt->bindparam(':bauthor',$bauthor);
                $stmt->bindparam(':tag',$tag);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':bcontent',$bcontent);
                $stmt->bindparam(':bpreview',$bpreview);
                $stmt->bindparam(':fblink',$fblink);
                $stmt->bindparam(':instalink',$instalink);
                $stmt->bindparam(':ytlink',$ytlink);
                $stmt->bindparam(':lilink',$lilink);
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

        public function insertFeedbacks($experience,$fren,$ts,$appr,$feedText,$event_id){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `event_feedback`(`overall_experience`, `staff_behaviour`, `date`, `relevance`, `suggestion`, `event_id`) VALUES (:experience,:fren,:ts,:appr,:feedText,:event_id)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':experience',$experience);
                $stmt->bindparam(':fren',$fren);
                $stmt->bindparam(':ts',$ts);
                $stmt->bindparam(':appr',$appr);
                $stmt->bindparam(':feedText',$feedText);
                $stmt->bindparam(':event_id',$event_id);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertEvent($event_name, $event_type){
            try {
                $sql = "INSERT INTO `events`(`event_name`, `event_type`) VALUES (:evname,:evtype)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':evname',$event_name);
                $stmt->bindparam(':evtype',$event_type);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function insertQuery($qmail,$qphone,$qcontent){
            try{
                $sql = "INSERT INTO `custqueries`(`qmail`, `qcontact`, `qcontent`) VALUES (:qmail,:qcontact,:qcontent)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':qmail',$qmail);
                $stmt->bindparam(':qcontact',$qphone);
                $stmt->bindparam(':qcontent',$qcontent);
                $stmt->execute();
                echo "<div class='py-3'>
                <div class='alert alert-success' role='alert'>
                  Query received! Our team will contact you soon.
                </div>
              </div>";
              return true;
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger' role='alert'>
                Operation Encountered An Error. Please retry. 
            </div>";
                return false;
            }
        }

        public function checkRepCom($cbid,$cmail){
            try{
                $sql = "SELECT COUNT(comment_id) FROM `blogcoments` WHERE `comment_mail` = :cmail AND `blog_id` = :cbid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':cmail',$cmail);
                $stmt->bindparam(':cbid',$cbid);
                $stmt->execute();
                $result = $stmt->fetchColumn();
                if ($result > 0) {
                    return false;
                }
                else
                    return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function countComments($id){
            try{
                $sql = "SELECT COUNT(comment_id) FROM `blogcoments` WHERE `blog_id` = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetchColumn();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
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

        public function editBlog($id,$btitle,$bauthor, $tag, $bcontent, $bpreview,$fblink,$instalink,$ytlink,$lilink,$reglink){
            try{ 
                 $sql = "UPDATE `ojblog` SET `blogtitle`=:btitle,`blogauthor`=:bauthor,`blog_tag_id`=:tag,`blogcontent`=:bcontent,`blogpreview`=:bpreview,`facebooklink`=:fblink,`instalink`=:instalink,`ytlink`=:ytlink,`lilink`=:lilink,`registrationlink`=:reglink WHERE blog_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':btitle',$btitle);
                 $stmt->bindparam(':bauthor',$bauthor);
                 $stmt->bindparam(':tag',$tag);
                 $stmt->bindparam(':bcontent',$bcontent);
                 $stmt->bindparam(':bpreview',$bpreview);
                 $stmt->bindparam(':fblink',$fblink);
                 $stmt->bindparam(':instalink',$instalink);
                 $stmt->bindparam(':ytlink',$ytlink);
                 $stmt->bindparam(':lilink',$lilink);
                 $stmt->bindparam(':reglink',$reglink);
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

         public function updateQuery($qid,$qstatus){
            try{ 
                 $sql = "UPDATE `custqueries` SET `qstatus`=:qstatus WHERE qid = :qid ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':qid',$qid);
                 $stmt->bindparam(':qstatus',$qstatus);
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
                $sql = "select *from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id order by dateofblog DESC LIMIT 9";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function updateVisitors($id){
            try {
                $sql = "UPDATE `ojblog` SET visits = visits+1 WHERE blog_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function updateLikes($id){
            try {
                $sql = "UPDATE `ojblog` SET Likes = Likes+1 WHERE id = :id";
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getQueries(){
            try{
                $sql = "SELECT * FROM `custqueries` order by qdate DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getEvents(){
            try{
                $sql = "SELECT * FROM `events`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getFeedbacks($evid){
            try{
                $sql = "SELECT * FROM `event_feedback` WHERE event_id = :evid";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$evid]);
                echo "<table class='table'>
                <tr>
                    <th>Overall Exp</th>
                    <th>Behaviour</th>
                    <th>Relevance</th>
                    <th>Suggestions</th>
                </tr>";
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                    <td>"; 
                    echo $row['overall_experience']; 
                    echo "</td>
                    <td>";
                    echo $row['staff_behaviour']; 
                    echo "</td>
                    <td>";
                    echo $row['relevance'];
                    echo "</td>
                    <td>";
                    echo $row['suggestion'];
                    echo "</td></tr>";
                }
                echo "</table>";
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function OverallAvg($evid){
            try {
                $sql = "SELECT AVG(overall_experience) FROM event_feedback WHERE event_id = :evid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':evid',$evid);
                $stmt->execute();
                $average = $stmt->fetchColumn();
                echo $average;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function FrenAvg($evid){
            try {
                $sql = "SELECT AVG(staff_behaviour) FROM event_feedback WHERE event_id = :evid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':evid',$evid);
                $stmt->execute();
                $average = $stmt->fetchColumn();
                echo $average;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function ApprAvg($evid){
            try {
                $sql = "SELECT AVG(relevance) FROM event_feedback WHERE event_id = :evid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':evid',$evid);
                $stmt->execute();
                $average = $stmt->fetchColumn();
                echo $average;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getComments($id){
            try{
                $sql = "SELECT * FROM `blogcoments` WHERE blog_id = ? order by comment_date DESC";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                while ($row = $stmt->fetch()) {
                    echo "<div class='comment mt-4 text-justify float-left'>
                    <h4 class='bold'>"; 
                    echo $row['comment_name']; 
                    echo "</h4> <p>";
                    echo $row['comment_content']; 
                    echo "</p><span class='text-black-50'>";
                    echo date("F d, Y", strtotime($row['comment_date']));
                    echo "</span>
                </div><hr/>";
                }
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function modComments($id){
            try{
                $sql = "SELECT * FROM `blogcoments` WHERE blog_id = ? ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                echo "<table class='table'>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Preview</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>";
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                    <td>"; 
                    echo $row['comment_name']; 
                    echo "</td>
                    <td>";
                    echo $row['comment_mail']; 
                    echo "</td>
                    <td>";
                    echo $row['comment_content'];
                    echo "</td>
                    <td>";
                    echo $row['comment_date'];
                    echo "</td>
                    <td><a onclick=\"return confirm('Are you sure you want to delete this record?')\" href='deletecomment.php?com_id=";
                    echo $row['comment_id'];
                    echo "&blog_id=";
                    echo $row['blog_id'];
                    echo "' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>";
                }
                echo "</table>";
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

         public function deleteQuery($qid){
            try{
                 $sql = "delete from custqueries where qid = :qid";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':qid', $qid);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

         public function deleteComment($com_id){
            try{
                 $sql = "DELETE FROM `blogcoments` WHERE comment_id = :com_id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':com_id', $com_id);
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
                $sql = "SELECT * FROM `ojblog` a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id WHERE `blogcontent` LIKE :search";
                $stmt = $this->db->prepare($sql);
                $stmt->bindvalue(':search', '%' . $search . '%');
                $stmt->execute();
                while ($r=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $card_src = $r['imagepath'];
                    $card_title = $r['blogtitle'];
                    $card_tag = $r['name'];
                    $card_date = $r['dateofblog'];
                    $card_text = $r['blogpreview'];
                    $card_href = $r['blog_id'];
                    $card_likes = $this->countComments($r['blog_id']);
                    $card_views = $r['visits'];
                    $card_author = $r['blogauthor'];
                    include "./includes/scards.php";
                }
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

        public function allBlogs($blogoffset){
            try {
                $blogo = 10*($blogoffset);
                $sql = "select *from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id order by dateofblog DESC LIMIT 10 OFFSET :blogoffset";
                $stmt = $this->db->prepare($sql);
                $stmt->bindvalue(':blogoffset', $blogo);
                $stmt->execute();
                while ($r=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $card_src = $r['imagepath'];
                    $card_title = $r['blogtitle'];
                    $card_tag = $r['name'];
                    $card_date = $r['dateofblog'];
                    $card_text = $r['blogpreview'];
                    $card_href = $r['blog_id'];
                    $card_likes = $r['Likes'];
                    $card_views = $r['visits'];
                    $card_author = $r['blogauthor'];
                    include "./includes/scards.php";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getallBlogs(){
            try{
                $sql = "select *from ojblog a inner join blogtypes s on a.blog_tag_id = s.blog_tag_id order by dateofblog DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
        }
 
    }
    
?>