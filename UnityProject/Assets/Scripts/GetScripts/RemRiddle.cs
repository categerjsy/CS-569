using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RemRiddle : MonoBehaviour
{
    public ArrayList r;
    // Start is called before the first frame update
    void Start()
    {
        r = GameObject.Find("DataManager").GetComponent<DataManagement>().Riddles;
        r.RemoveAt(0);
        GameObject.Find("DataManager").GetComponent<DataManagement>().Riddles = r;

    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
