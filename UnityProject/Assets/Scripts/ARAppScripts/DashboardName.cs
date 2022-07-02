using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

public class DashboardName : MonoBehaviour
{
    [SerializeField]
    public TMP_Text THunt;
    [SerializeField]
    public TMP_Text Team;
    void Start()
    {
        THunt.text = GameObject.Find("DataManager").GetComponent<DataManagement>().TreasureHuntName;
    }
}
