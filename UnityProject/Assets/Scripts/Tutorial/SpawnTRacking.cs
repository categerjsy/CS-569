using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class SpawnTRacking : MonoBehaviour
{
    private Text m_Text;
    public RayCastActionResolver resolver;

    private void Start()
    {
        m_Text = GetComponent<Text>();
    }
    private void OnGUI()
    {
        m_Text.text = resolver.numCreepers.ToString();
    }
}
