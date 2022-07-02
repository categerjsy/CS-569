using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

public class THuntName : MonoBehaviour
{
    [SerializeField]
    public TMP_Text THunt;
    void Start()
    {
        THunt.text = GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntName;
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
