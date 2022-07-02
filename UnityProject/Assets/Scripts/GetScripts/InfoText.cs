using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
public class InfoText : MonoBehaviour
{
    public ArrayList riddles;
    // Start is called before the first frame update
    void Start()
    {
        riddles = GameObject.Find("DataManager").GetComponent<DataManagement>().Riddles;
        Riddle r = (Riddle)riddles[0];
        string FirstInfo = r.getInfo();
        GameObject.Find("Solved(Clone)/UI/Canvas/BluePanel/Responses/InfoText").GetComponent<TextMeshProUGUI>().text = FirstInfo;
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
