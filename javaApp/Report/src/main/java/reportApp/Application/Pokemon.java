package reportApp.Application;

public class Pokemon {

    private int id;
    private String name;
    private String first_type;
    private String second_type;


    public Pokemon(int id, String name, String first_type, String second_type){
        this.id = id;
        this.first_type = first_type;
        this.name = name;
        this.second_type = second_type;
    }

    public Pokemon(int id, String name, String first_type){
        this.id = id;
        this.first_type = first_type;
        this.name = name;
        this.second_type = "";
    }
    public void display(){
        System.out.println(id + " " + name + " " + first_type + " " + second_type + " ");
    }

    public int getId(){ return id; }
    public String getName(){return name;}
    public String getFirst_type(){return first_type;}
    public String getSecond_type(){return second_type;}
}
