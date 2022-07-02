using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Riddle : MonoBehaviour
{
    private string text { get; set; }
    private string location_solution { get; set; }
    private string infotext { get; set; }
    private string points { get; set; }
    private string photo { get; set; }
    public Riddle(string text, string location_solution, string infotext, string points,string photo)
    {
        this.text = text;
        this.location_solution = location_solution;
        this.infotext = infotext;
        this.points = points;
        this.photo = photo;
    }

    public string getText() { return this.text;}
    public string getLocation() { return this.location_solution; }
    public string getInfo() { return this.infotext; }
    public string getPoints() { return this.points; }
    public string getPhoto() { return this.photo; }

    public override string ToString()
    {
        return "Riddle: " + text + " " + location_solution + " " + infotext + " " + points;
    }
}
