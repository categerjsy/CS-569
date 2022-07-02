using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;
public class TeamName : MonoBehaviour
{
    [SerializeField]
    public TMP_Text Team;
    // Start is called before the first frame update
    void Start()
    {
        //Team.text = GameObject.Find("DataManager").GetComponent<DataManagement>().TeamName;
    }


}